<?php
$arr = [17,2,4,7,1,3,9,3];
// $arr = range(1,20000);
// shuffle($arr);

$time1 = time();

$max = 0;
$min = null;
$diff = null;
$reserveMin = null;
foreach($arr as $v) {
    if (is_null($min)) {
        $min = $v;
    }
    // 找到更大的值，更新差值
    if ($v > $max) {
        $max = $v;
        $diff = $max - $min;
    }
    // 预存最小值
    if ($v < $min) {
        if (is_null($reserveMin)) {
            $reserveMin = $v;
        } elseif (!is_null($reserveMin) && $v < $reserveMin) {
            $reserveMin = $v;
        }
    }
    // 预存最小值存在,且（当前值-预存值）大于差值
    if (!is_null($reserveMin) && (($v - $reserveMin) > $diff)) {
        $max = $v;
        $min = $reserveMin;
        $reserveMin = null;
    }
}
$time2 = time();
var_dump($time2-$time1,$min,$max);