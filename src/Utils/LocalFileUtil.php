<?php

declare(strict_types=1);

namespace Seq6\MyPhpScript\Utils;

use Generator;
use League\Flysystem\Filesystem as LeagueFilesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\StorageAttributes;

/**
 * docs: https://flysystem.thephpleague.com/v2/docs/
 */
class LocalFileUtil
{
    private static LeagueFilesystem $fs;

    public static function getStoragePath(): string
    {
        return dirname(__DIR__, 2) . '/storage';
    }

    /**
     * 逐行处理文件
     *
     * @param string $file
     * @return Generator
     */
    public static function getLines(string $file): Generator
    {
        if (!is_file($file)) {
            ClimateUtil::printError("文件不存在：" . $file);
            return;
        }
        $handle = fopen($file, 'r');
        if ($handle === false) {
            ClimateUtil::printError("打开文件失败：" . $file);
            return;
        }

        while (($line = fgets($handle)) !== false) {
            yield $line;
        }
        fclose($handle);
    }

    /**
     * 写文件
     *
     * @param string $file
     * @param string $content
     * @param int $flag
     * @return void
     */
    public static function writeFile(string $file, string $content, int $flag = 0): void
    {
        $filePath = self::getStoragePath() . '/' . trim($file, '/');
        file_put_contents($filePath, $content, $flag);
    }

    /**
     * 读文件
     *
     * @param string $file
     * @return string
     */
    public static function readFile(string $file): string
    {
        $filePath = self::getStoragePath() . '/' . trim($file, '/');
        return file_get_contents($filePath);
    }


    public static function getLocalFs(): LeagueFilesystem
    {
        if (is_null(self::$fs)) {
            $adapter = new LocalFilesystemAdapter(self::getStoragePath());
            self::$fs = new LeagueFilesystem($adapter);
        }
        return self::$fs;
    }

    public static function dirListing(string $dirPath): array
    {
        return self::getLocalFs()->listContents($dirPath)->filter(
            fn(StorageAttributes $attr) => $attr->isFile()
        )->toArray();
    }
}
