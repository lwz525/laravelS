<?php
$count = 0;
\Swoole\Timer::tick(1000,function ($timerId,$count){
	global $count;
	echo $timerId;
	echo "hello swoole\n";
	$count++;
	if($count === 3) {
		swoole_timer_clear($timerId);
	}
},$count);