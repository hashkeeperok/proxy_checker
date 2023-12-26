<?php

declare(strict_types=1);

namespace App\Services\ProxyCheckers;

use App\Contracts\ProxyCheckerServiceContract;
use App\Dto\ProxyCheckDto;
use App\Enums\ProxyTypeEnum;

class ProxyCheckService implements ProxyCheckerServiceContract
{
    public function check(string $ipPort): ProxyCheckDto
    {
        if (str_contains($ipPort, '@')) {
            $data = explode('@', $ipPort);
            $loginPasswordArray = explode(':', $data[0]);
            $ipPortArray = explode(':', $data[1]);
        } else {
            $ipPortArray = explode(':', $ipPort);
        }

        $port =  $ipPortArray[1];
        $login = $loginPasswordArray[0] ?? null;
        $password = $loginPasswordArray[1] ?? null;

        $types = $this->getCurlProxyTypes($port);

        foreach ($types as $type) {
            try {
                $result = $this->CheckAvailability($ipPort, $login, $password, $type);
            } catch (\Throwable) {
                continue;
            }

            $location = $this->getLocationByIp($result['ip']);

            return new ProxyCheckDto(
                name: $ipPort,
                isAvailable: true,
                type: $type,
                location: $location,
                timeout: strval($result['total_time']),
                ip: $result['ip'],
            );
        }

        return new ProxyCheckDto(
            name: $ipPort,
            isAvailable: false,
        );
    }

    protected function CheckAvailability($ipPort, $login, $password, ProxyTypeEnum $proxyType = ProxyTypeEnum::HTTP): array
    {
        $curlProxyType = ProxyTypeEnum::curlValues()[$proxyType->value];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, 'http://dynupdate.no-ip.com/ip.php');
        curl_setopt($ch, CURLOPT_PROXY, $ipPort);
        curl_setopt($ch, CURLOPT_PROXYTYPE, $curlProxyType);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        $content = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        if ($content === false)
            throw new \Exception('Empty content');

        if (str_contains($content, 'check this string in proxy response content'))
            throw new \Exception('Wrong content');

        if ($info['http_code'] !== 200)
            throw new \Exception('Code invalid: ' . $info['http_code']);

        return [
            'total_time' => $info['total_time'],
            'ip' => $content,
        ];
    }

    protected function getCurlProxyTypes(string $port): array
    {
        $result = [];

        if ($port === '80' || $port === '8080') {
            $result[ProxyTypeEnum::HTTP->value] = ProxyTypeEnum::HTTP;
        } elseif ($port === '443') {
            $result[] = ProxyTypeEnum::HTTPS;
        } elseif ($port === '1080') {
            $result[] = ProxyTypeEnum::SOCKS4;
        }

        foreach (ProxyTypeEnum::all() as $proxyType) {
            if (in_array($proxyType, $result)) {
                continue;
            }

            $result[] = $proxyType;
        }

        return $result;
    }

    protected function getLocationByIp(string $ip): ?string
    {
        try {
            $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        } catch(\Throwable) {
            return null;
        }

        return $details->country . ', ' . $details->city;
    }
}