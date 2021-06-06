<?php
$redis = new Redis();
$redis->connect('192.168.33.60', 6379);
$redis->auth('bb123456.');
// $redis->set('num', 0);
$num = 0;
while(true) {
    if ($num == 1000) {
        break;
    }
    $redis->incr('num', $num);
    $num++;
}
echo 'end';