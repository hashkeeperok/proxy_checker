<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\ProxyCheckList;

class HomeController extends Controller
{
    public function index()
    {
        $proxyCheckLists = ProxyCheckList::query()->paginate();

        return view('home', compact('proxyCheckLists'));
    }
}
