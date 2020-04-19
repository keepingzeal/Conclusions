<?php
$day1 = '2019-11-22';
$day2 = '2011-11-23';

//方法一： 用DateTime类
$d1 = new dateTime($day1);
$d2 = new dateTime($day2);
echo $d1->diff($d2)->days;

//方法二： 用时间戳计算
echo (strtotime($day2) - strtotime($day1))/(24*3600);

//方法三： 返回2个日期相差的时间
function returnDiffTime($end_time, $start_time = 0, $need_to_timestamp = false) {
	if (!$start_time) {
		$start_time = time();
	}
	if ($need_to_timestamp) {
		$diff_time = strtotime($start_time) - strtotime($end_time);
	} else {
		$diff_time = $start_time - $end_time;
	}

	if (!$diff_time) {
		return false;
	}

	if ($diff_time > 86400) {
		return floor($diff_time / 86400).'天前';
	} else if ($diff_time > 3600) {
		return floor($diff_time / 3600).'小时前';
	} else if ($diff_time > 60) {
		return floor($diff_time / 60).'分钟前';
	} else {
		return floor($diff_time).'秒前';
	}
}

echo returnDiffTime(1587110493);