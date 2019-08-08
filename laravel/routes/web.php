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

use App\Events\TestEvent;
use App\Jobs\TestTask;
use Hhxsv5\LaravelS\Swoole\Task\Event;
use Hhxsv5\LaravelS\Swoole\Task\Task;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/task/test',function (){
	$task = new TestTask('测试异步任务');
	$success = Task::deliver($task);
	var_dump($success);
});
Route::get('/event/test',function (){
	$event = new TestEvent('测试异步事件监听及处理');
	$success = Event::fire($event);
	var_dump($success);
});