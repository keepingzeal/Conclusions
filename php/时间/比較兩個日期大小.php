<?php
$toDay = Date('Y-m-d');
$date = '2020-01-11';
function dateCurrent($date = '') {
	// 日期大於當前時間
	if (strtotime($date) > strtotime(Date('Y-m-d'))) {
		return true;
	}
	return false;
}
echo strtotime($date.' 23:59:59');