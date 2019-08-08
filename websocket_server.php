<?php

use Swoole\WebSocket\Server;

$server = new Swoole\WebSocket\Server('localhost',8000);
$server->on('open',function (Server $server,$request){
	echo "server: handshake success with fd{$request->fd}\n";
});
$server->on('message',function (Server $server,$frame){
	echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
	$server->push($frame->fd, "this is server");
});

$server->on('close',function ($ser,$fd){
	echo "client {$fd} closed\n";
});
$server->start();