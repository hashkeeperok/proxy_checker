<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\ProxyCheckList;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProxyCheckListCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public ProxyCheckList $proxyCheckList)
    {
    }
}
