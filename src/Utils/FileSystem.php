<?php

declare(strict_types=1);

namespace Seq6\MyPhpScript\Utils;

use League\Flysystem\Filesystem as LeagueFilesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\StorageAttributes;

/**
 * docs: https://flysystem.thephpleague.com/v2/docs/
 */
class FileSystem
{
    private static LeagueFilesystem $fs;

    public static function getStoragePath(): string
    {
        return realpath(dirname(__DIR__) . '/../storage');
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
            fn (StorageAttributes $attr) => $attr->isFile()
        )->toArray();
    }
}
