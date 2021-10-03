<?php

declare(strict_types=1);

namespace Seq6\MyPhpScript\Utils;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Ramsey\Uuid\Uuid;

/**
 * docs: https://seldaek.github.io/monolog/
 */
class Log
{
    private static Logger $logger;

    private static string $contextId;

    private static function getLogger(): Logger
    {
        if (is_null(self::$logger)) {
            self::$logger = new Logger('app');
            $filePath = FileSystem::getStoragePath() . '/logs/' . date('Y-m-d') .  '.log';
            self::$logger->pushHandler(new StreamHandler($filePath, Logger::INFO));
        }
        return self::$logger;
    }

    /**
     * docs: https://uuid.ramsey.dev/en/stable/
     *
     * @return string
     */
    private static function getContextId(): string
    {
        if (empty(self::$contextId)) {
            self::$contextId = Uuid::uuid4()->toString();
        }
        return self::$contextId;
    }

    public static function info(string $message, array $context = [])
    {
        if (is_null($context)) {
            $context = [];
        }
        $context['id'] = self::getContextId();
        self::getLogger()->info($message, $context);
    }

    public static function error(string $message, array $context = [])
    {
        if (is_null($context)) {
            $context = [];
        }
        $context['id'] = self::getContextId();
        self::getLogger()->error($message, $context);
    }
}
