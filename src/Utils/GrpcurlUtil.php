<?php

namespace Seq6\MyPhpScript\Utils;

use Exception;
use mikehaertl\shellcommand\Command;

/**
 * grpcurl工具，用于抓取grpc接口信息
 */
class GrpcurlUtil
{
    const VERSION_LOW = 1;      // 低版本(1.0)
    const VERSION_HIGH = 2;     // 高版本(>=1.1)

    const COMMAND_VERSION = 'grpcurl --version';
    const COMMAND_LIST = 'grpcurl -plaintext %s list';
    const COMMAND_DESCRIBE = 'grpcurl -plaintext %s describe %s';
    const COMMAND_TEMPLATE = 'grpcurl -msg-template -plaintext %s describe %s';

    private int $version;
    private string $address;
    private array $localCache;

    public function __construct(string $address)
    {
        $this->address = $address;

        // 1.0版本无version参数
        $this->version = (new Command(self::COMMAND_VERSION))->execute() ? self::VERSION_HIGH : self::VERSION_LOW;
    }

    /**
     * 获取所有服务
     *
     * @return array
     * @throws Exception
     */
    private function getServiceList(): array
    {
        $command = new Command(sprintf(self::COMMAND_LIST, $this->address));
        if (!$command->execute()) {
            throw new Exception($command->getError());
        }

        $services = [];
        foreach (explode("\n", $command->getOutput()) as $line) {
            if (!str_starts_with($line, 'grpc.reflection')) {
                $services[] = $line;
            }
        }
        return $services;
    }

    /**
     * 获取服务信息
     *
     * @param string $service
     * @return array
     * @throws Exception
     */
    private function getMethods(string $service): array
    {
        $command = new Command(sprintf(self::COMMAND_DESCRIBE, $this->address, $service));
        if (!$command->execute()) {
            throw new Exception($command->getError());
        }

        // 1.0版本会直接返回json格式
        if ($this->version == self::VERSION_LOW) {
            // 去掉第一行描述信息
            $parts = explode("\n", $command->getOutput(), 2);
            if (count($parts) != 2) {
                return [];
            }
            return json_decode($parts[1], true)['method'] ?? [];
        }

        // 1.1及以上版本返回proto原始定义信息，需进行字符串解析
        $methods = [];
        foreach (explode("\n", $command->getOutput()) as $line) {
            $line = trim($line);
            if (!str_starts_with($line, 'rpc')) {
                continue;
            }
            $line = str_replace(['rpc', '(', ')', 'returns', ';'], '', $line);
            $ele = [];
            foreach (explode(' ', $line) as $e) {
                $e = trim($e);
                if (empty($e)) {
                    continue;
                }
                $ele[] = $e;
            }
            if (count($ele) != 3) {
                continue;
            }
            $methods[] = ['name' => $ele[0], 'inputType' => $ele[1], 'outputType' => $ele[2]];
        }
        return $methods;
    }

    /**
     * 获取数据结构示例
     *
     * @param string $messageName
     * @return array
     * @throws Exception
     */
    private function getMessage(string $messageName): array
    {
        if ($this->version == self::VERSION_HIGH) {
            return $this->getMessageTemplate($messageName);
        } else {
            return $this->getMessageTemplateOld($messageName);
        }
    }

    /**
     * 获取数据模板(1.1及以上版本可使用)
     *
     * @param string $messageName
     * @return array
     * @throws Exception
     */
    private function getMessageTemplate(string $messageName): array
    {
        $messageName = trim($messageName, '.');
        $command = new Command(sprintf(self::COMMAND_TEMPLATE, $this->address, $messageName));
        if (!$command->execute()) {
            throw new Exception($command->getError());
        }
        $part = explode('template:', $command->getOutput(), 2);
        return count($part) != 2 ? [] : json_decode($part[1], true);
    }

    /**
     * 获取数据模板(1.0版本使用)
     *
     * @param string $messageName
     * @return array
     * @throws Exception
     */
    private function getMessageTemplateOld(string $messageName): array
    {
        $messageName = trim($messageName, '.');

        $dt = $this->getDataType($messageName);
        if (empty($dt['field'])) {
            return [];
        }

        $temp = [];
        foreach ($dt['field'] as $field) {
            switch ($field['type']) {
                case 'TYPE_BOOL':
                    $temp[$field['jsonName']] = ($field['label'] == 'LABEL_REPEATED' ? [false] : false);
                    break;
                case 'TYPE_BYTES':
                case 'TYPE_STRING':
                    $temp[$field['jsonName']] = ($field['label'] == 'LABEL_REPEATED' ? [''] : '');
                    break;
                case 'TYPE_INT64':
                case 'TYPE_INT32':
                case 'TYPE_DOUBLE':
                    $temp[$field['jsonName']] = ($field['label'] == 'LABEL_REPEATED' ? [0] : 0);
                    break;
                case 'TYPE_ENUM':
                    $enums = $this->getDataType($field['typeName']);
                    $enum = $enums['value'][0]['name'] ?? '';
                    $temp[$field['jsonName']] = ($field['label'] == 'LABEL_REPEATED' ? [$enum] : $enum);
                    break;
                case 'TYPE_MESSAGE':
                    $msg = $this->getMessageTemplateOld($field['typeName']);
                    $temp[$field['jsonName']] = ($field['label'] == 'LABEL_REPEATED' ? [$msg] : $msg);
                    break;
            }
        }
        return $temp;
    }

    /**
     * 获取数据类型
     *
     * @param string $typeName
     * @return array
     * @throws Exception
     */
    private function getDataType(string $typeName): array
    {
        // 查缓存
        $typeName = trim($typeName, '.');
        if (isset($this->localCache[$typeName])) {
            return $this->localCache[$typeName];
        }

        $command = new Command(sprintf(self::COMMAND_DESCRIBE, $this->address, $typeName));
        if (!$command->execute()) {
            throw new Exception($command->getError());
        }

        // 去掉第一行描述信息
        $parts = explode("\n", $command->getOutput(), 2);
        if (count($parts) != 2) {
            return [];
        }
        $dataType = json_decode($parts[1], true);
        $this->localCache[$typeName] = $dataType;

        return $dataType;
    }

    /**
     * 获取grpc服务所有接口信息
     *
     * @param string $address
     * @return array|false
     */
    public static function info(string $address): array|false
    {
        try {
            $g = new GrpcurlUtil($address);
            $res = [];
            $services = $g->getServiceList();
            foreach ($services as $service) {
                $res[] = [
                    'service' => $service,
                    'methods' => $g->getMethods($service),
                    'message' => []
                ];
            }
            foreach ($res as $i => $r) {
                foreach ($r['methods'] as $method) {
                    $res[$i]['message'][$method['inputType']] = $g->getMessage($method['inputType']);
                    $res[$i]['message'][$method['outputType']] = $g->getMessage($method['outputType']);
                }
            }
            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
