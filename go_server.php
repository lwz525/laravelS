<?php

use Swoole\Server;

$server = new Server("127.0.0.1", 9501);
$server->on('receive',function ($serv,$fd,$from_id,$data){
	//向客户端发送数据后关闭连接(在这里可以调用swoole协程api
	$serv->send($fd,'swoole: '.$data);
	$serv->close($fd);
});
$server->start();