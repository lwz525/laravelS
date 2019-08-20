<?php

use Swoole\Client;

go(function (){
	$client = new Client(SWOOLE_SOCK_TCP);
	//尝试与指定tcp服务器建立连接,这里会触发io事件切换协程,交出控制权让cpu去处理其他事情,
	if($client->connect("127.0.0.1", 9501, 0.5)) {
		//建立连接后发送内容
		$client->send("hello\n");
		//打印接收到的消息(调用recv 函数会恢复协程继续处理后续代码,比如打印消息,关闭连接)
		echo $client->recv();
		$client->close();
	}else{
		echo "connect failed.";
	}
});