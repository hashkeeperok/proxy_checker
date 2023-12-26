<?php

declare(strict_types=1);

namespace App\Enums;

enum ProxyTypeEnum: int
{
    case HTTP = 0;
    case HTTPS = 1;
    case SOCKS4 = 2;
    case SOCKS5 = 3;

    public static function all(): array
    {
        return [
            self::HTTP,
            self::HTTPS,
            self::SOCKS4,
            self::SOCKS5,
        ];
    }

    public static function names(): array
    {
        return [
            self::HTTP->value => 'http',
            self::HTTPS->value => 'https',
            self::SOCKS4->value => 'SOCKS4',
            self::SOCKS5->value => 'SOCKS5',
        ];
    }

    public static function curlValues(): array
    {
        return [
            self::HTTP->value => CURLPROXY_HTTP,
            self::HTTPS->value => CURLPROXY_HTTPS,
            self::SOCKS4->value => CURLPROXY_SOCKS4,
            self::SOCKS5->value => CURLPROXY_SOCKS5,
        ];
    }
}
