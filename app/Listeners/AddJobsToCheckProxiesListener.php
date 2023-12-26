<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\ProxyCheckListCreatedEvent;
use App\Jobs\CheckProxyJob;

class AddJobsToCheckProxiesListener
{
    public function handle(ProxyCheckListCreatedEvent $event): void
    {
        foreach ($event->proxyCheckList->proxy_list as $proxy) {
            CheckProxyJob::dispatch($event->proxyCheckList, $proxy);
        }
    }
}
