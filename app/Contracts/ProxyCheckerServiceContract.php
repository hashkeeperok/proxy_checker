<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Dto\ProxyCheckDto;

interface ProxyCheckerServiceContract
{
    public function check(string $ipPort): ProxyCheckDto;
}