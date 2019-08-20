<?php
//初始化一个容量为1024的swoole table
use Swoole\Table;

$table = new Table(1024);
//在table中新增id列
$table->column('id',Table::TYPE_INT);
$table->column('name',Table::TYPE_STRING,10);
$table->column('score',Table::TYPE_FLOAT);
$table->create();

// 设置 Key-Value 值
$table->set('student-1', ['id' => 1, 'name' => '学小君', 'score' => 80]);
$table->set('student-2', ['id' => 2, 'name' => '学院君', 'score' => 90]);
//如果指定key值存在则打印对应value值
if($table->exist('student-1')){
	 echo "Student-" . $table->get('student-1', 'id') . ':' . $table->get('student-1', 'name').":".
		 $table->get('student-1', 'score') . "\n";
}
// 自增操作
$table->incr('student-2', 'score', 5);
// 自减操作
$table->decr('student-2', 'score', 5);

// 表中总记录数
$count = $table->count();

// 删除指定表记录
$table->del('student-1');