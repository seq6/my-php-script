<?php

declare(strict_types=1);

use Seq6\MyPhpScript\Utils\ClimateUtil;

require 'vendor/autoload.php';

$arguments = ClimateUtil::checkArgv(
    '抓取笔趣阁文章',
    [
        'id' => [
            'prefix' => 'i',
            'longPrefix' => 'id',
            'description' => 'id',
            'required' => true
        ],
        'out' => [
            'prefix' => 'o',
            'longPrefix' => 'out',
            'description' => '输出文件名',
            'defaultValue' => 'biqugeu.txt'
        ]
    ],
    $argv
);
if ($arguments === false) {
    exit();
}
$id = $arguments['id']->value();
$outFile = $arguments['out']->value();

 // todo

