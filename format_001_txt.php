<?php

declare(strict_types=1);

use Seq6\MyPhpScript\Utils\ClimateUtil;
use Seq6\MyPhpScript\Utils\LocalFileUtil;
use sqhlib\Hanzi\HanziConvert;

require 'vendor/autoload.php';

$arguments = ClimateUtil::checkArgv(
    '格式化文本',
    [
        'file' => [
            'prefix' => 'f',
            'longPrefix' => 'file',
            'description' => '文件路径',
            'required' => true
        ],
        'out' => [
            'prefix' => 'o',
            'longPrefix' => 'out',
            'description' => '输出文件名',
            'defaultValue' => 'out.txt'
        ]
    ],
    $argv,
);
if ($arguments === false) {
    exit();
}
$file = $arguments['file']->value();
$outFile = $arguments['out']->value();

$content = '';
$completeLine = '';
foreach (LocalFileUtil::getLines($file) as $i => $line) {
    // 替换html标签
    $line = str_replace(['<br />', '</font>'], '', trim($line));
    $line = str_replace('&nbsp;', '　', $line);
    // 繁体转简体
    $line = HanziConvert::convert($line);
    // 换行
    if (empty($line) || str_starts_with($line, '　')) {
        $content .= trim($completeLine) . "\n";
        $completeLine = trim($line);
    } else {
        $completeLine .= trim($line);
    }
}
if (!empty($completeLine)) {
    $content .= trim($completeLine);
}

LocalFileUtil::writeFile($outFile, $content);