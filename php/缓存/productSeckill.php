<?php

$redis = new Redis();

// $redis->connect('192.168.33.16', 6379);
// $redis->auth('bb123456');
// echo $redis->get('name');


// 抢购
$redis->connect('127.0.0.1', 6379);
$redis->select(1);

// $redis->set('p_num', 50);	// 商品数量
// $redis->set('p_fail', 0);	// 记录抢购失败


$p_num = $redis->get('p_num');
if ($p_num>0) {
	$redis->decr('p_num');
} else {
	$redis->incr('p_fail');
}



// $arr = array('h','e','l','l','o','w','o','r','l','d');
 
// foreach($arr as $k=>$v){
//   $redis->rpush("mylist",$v);
// }
	
// $value = $redis->lpop('mylist');
// if ($value) {
	
// }
// // $redis->set('kill_num', 50);
// $redis->watch('kill_num', 'kull_user');
// $num = $redis->get('kill_num');

// if ($num > 0) {
// 	$redis->multi();
// 	$redis->decr('kill_num');
// 	$redis->rPush('kill_user', '9999');
// }
// $redis->exec();

// $redis->set('test01', 50);
