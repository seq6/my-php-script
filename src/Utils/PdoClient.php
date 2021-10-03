<?php

declare(strict_types=1);

namespace Seq6\MyPhpScript\Utils;

use PDO;

/**
 * dosc: https://www.php.net/manual/zh/pdo.connections.php
 */
class PdoClient
{
    /**
     * 获取mysql连接
     *
     * @param string $host
     * @param integer $port
     * @param string $db
     * @param string $user
     * @param string $pwd
     * @return PDO
     */
    public static function getMysqlClient(string $host, int $port, string $db, string $user, string $pwd): PDO
    {
        return new PDO(
            sprintf('mysql:host=%s;port=%d;dbname=%s;charset=utf8mb4', $host, $port, $db),
            $user,
            $pwd,
        );
    }

    /**
     * 获取pg连接
     *
     * @param string $host
     * @param integer $port
     * @param string $db
     * @param string $user
     * @param string $pwd
     * @return PDO
     */
    public static function getPgClient(string $host, int $port, string $db, string $user, string $pwd): PDO
    {
        return new PDO(
            sprintf('pgsql:host=%s;port=%d;dbname=%s', $host, $port, $db),
            $user,
            $pwd,
        );
    }

    /**
     * 获取sqlite连接
     *
     * @param string $fileName
     * @return PDO
     */
    public static function getSQLiteClient(string $fileName): PDO
    {
        return new PDO('sqlite:' . realpath($fileName));
    }
}
