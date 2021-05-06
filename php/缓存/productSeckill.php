<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->select(1);
// $redis->set('kill_num', 50);
$redis->watch('kill_num', 'kull_user');
$num = $redis->get('kill_num');

if ($num > 0) {
	$redis->multi();
	$redis->decr('kill_num');
	$redis->rPush('kill_user', '9999');
}
$redis->exec();