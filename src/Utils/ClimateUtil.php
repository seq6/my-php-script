<?php

namespace Seq6\MyPhpScript\Utils;

use Exception;
use League\CLImate\Argument\Argument;
use League\CLImate\CLImate;

/**
 * 命令行工具，用于校验参数及打印信息
 */
class ClimateUtil
{
    private static CLImate $climate;

    private static function getInstance(): CLImate
    {
        if (empty(self::$climate)) {
            self::$climate = new CLImate();
        }
        return self::$climate;
    }

    /**
     * 检查命令行参数
     *
     * @param string $description
     * @param array $arguments
     * @param array $argv
     * @return false|Argument[]
     */
    public static function checkArgv(string $description, array $arguments, array $argv): bool|array
    {
        $climate = self::getInstance();
        $climate->description($description);
        $climate->arguments->add($arguments);
        try {
            $climate->arguments->parse($argv);
            return $climate->arguments->all();
        } catch (Exception $e) {
            self::printError($e->getMessage());
            $climate->usage();
            return false;
        }
    }

    /**
     * 输出错误日志(红色)
     *
     * @param string $msg
     * @return void
     */
    public static function printError(string $msg): void
    {
        self::getInstance()->red($msg);
    }

    /**
     * 输出日志(白色)
     *
     * @param string $msg
     * @return void
     */
    public static function printInfo(string $msg): void
    {
        self::getInstance()->out($msg);
    }

    /**
     * 输出日志(json)
     *
     * @param array $msg
     * @return void
     */
    public static function printJson(array $msg): void
    {
        self::getInstance()->json($msg);
    }

    /**
     * 输出提示信息(绿色)
     *
     * @param string $msg
     * @return void
     */
    public static function printTip(string $msg): void
    {
        self::getInstance()->green($msg);
    }
}