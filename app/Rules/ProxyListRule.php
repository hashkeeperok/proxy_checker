<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProxyListRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $ips = explode("\n", $value);

        foreach ($ips as $ip) {
            if (!$this->validateIpPort($ip)) {
                $fail('Некорректный список прокси');
            }
        }
    }

    protected function validateIpPort($input): bool
    {
        $pattern = '/^(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}):(\d{1,5})$/';

        return (bool) preg_match($pattern, $input);
    }
}
