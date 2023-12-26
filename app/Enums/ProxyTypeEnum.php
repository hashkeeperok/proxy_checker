<?php

declare(strict_types=1);

namespace App\Enums;

enum ProxyTypeEnum: int
{
    case HTTP = 0;
    case HTTPS = 1;
    case SOCKS5 = 2;

    public static function descriptions(): array
    {
        return [
            self::HTTP->value => 'Создана',
            self::HTTPS->value => 'В процессе',
            self::SOCKS5->value => 'Отменена',
        ];
    }
}
