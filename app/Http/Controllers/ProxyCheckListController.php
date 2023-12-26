<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\ProxyCheckListCreatedEvent;
use App\Http\Requests\ProxyCheckListStoreRequest;
use App\Models\ProxyCheckList;

class ProxyCheckListController extends Controller
{
    public function store(ProxyCheckListStoreRequest $request)
    {
        $validated = $request->validated();
        $ips = explode("\n", $validated['proxy_list']);

        $proxyCheckList = ProxyCheckList::query()->create([
            'count' => count($ips),
            'proxy_list' => $ips,
        ]);

        ProxyCheckListCreatedEvent::dispatch($proxyCheckList);

        return redirect()->route('home.index');
    }

    public function show(ProxyCheckList $proxyCheckList)
    {
        $proxyChecks = $proxyCheckList->proxy_checks()->paginate();

        return view('proxy_check_list.show', compact('proxyCheckList', 'proxyChecks'));
    }
}
