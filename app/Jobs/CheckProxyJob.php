<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Contracts\ProxyCheckerServiceContract;
use App\Models\ProxyCheck;
use App\Models\ProxyCheckList;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckProxyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function __construct(protected ProxyCheckList $proxyCheckList, protected string $proxy)
    {
    }

    public function handle(ProxyCheckerServiceContract $proxyCheckerService)
    {
        $proxyCheckDto = $proxyCheckerService->check($this->proxy);

        ProxyCheck::query()->create([
            'ip_port' => $proxyCheckDto->name,
            'is_available' => $proxyCheckDto->isAvailable,
            'location' => $proxyCheckDto->location,
            'type' => $proxyCheckDto->type,
            'level' => $proxyCheckDto->level,
            'timeout' => $proxyCheckDto->timeout,
            'real_ip' => $proxyCheckDto->ip,

            'proxy_check_list_id' => $this->proxyCheckList->id,
        ]);

        //TODO:: не успел сделать обнову кол-во прочеканых
    }
}
