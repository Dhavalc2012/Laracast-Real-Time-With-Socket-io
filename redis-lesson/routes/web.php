<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Redis;



Route::get('/', function () {
    Redis::set('name','Dhawal');

    //return Redis::get('name');
    //return Redis::hget('preferences','length');

    Cache::put('foo','bar',10);
    return Cache::get('foo');
});
