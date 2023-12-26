<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::post('/', [\App\Http\Controllers\ProxyCheckListController::class, 'store'])->name('proxy_check_list.index');
Route::get('/proxy-check-list/{proxy_check_list}', [\App\Http\Controllers\ProxyCheckListController::class, 'show'])->name('proxy_check_list.show');
