<?php

declare(strict_types=1);

namespace App\Dto;

use App\Enums\ProxyTypeEnum;

class ProxyCheckDto
{
    public function __construct(
        readonly public string $name,
        readonly public bool $isAvailable,
        readonly public ?ProxyTypeEnum $type = null,
        readonly public ?string $location = null,
        readonly public ?string $level = null,
        readonly public ?string $timeout = null,
        readonly public ?string $ip = null,
    ) {
    }
}
