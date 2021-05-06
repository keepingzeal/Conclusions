<?php
// 在某日期的基础上增加10天
// $date = date_create('2000-01-01 9:20:00');
// date_add($date, date_interval_create_from_date_string('50 days'));
// echo date_format($date, 'Y-m-d H:i:s');


// $date = new DateTime('2000-01-01');
// // 增加7年5个月4天4小时3分钟2秒
// $date->add(new DateInterval('P7Y5M4DT4H3M2S'));
// echo $date->format('Y-m-d H:i:s') . "\n";

echo date("Y-m-d H:i:s",strtotime("-1 days"));