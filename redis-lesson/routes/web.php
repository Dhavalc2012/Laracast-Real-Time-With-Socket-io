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
use App\Events\UserSignedUp;



// Route::get('/', function () {
//     Redis::set('name','Dhawal');

//     //return Redis::get('name');
//     //return Redis::hget('preferences','length');

//     Cache::put('foo','bar',10);
//     return Cache::get('foo');
// });


Route::get('/', function(){
    //1. Publish event with Redis
    $data = [
        'event' => 'UserSignedUp',
        'data' => [
            'username' => 'jonhenDoe'
        ]
    ];
    Redis::publish('test-channel',json_encode($data));

    //2. Node.js + Redis subscribes to the event

   // return 'Done';
    //3. Use socket.io to emit to all clients.
    event(new UserSignedUp('JohnDoe'));
        return view('welcome');
});