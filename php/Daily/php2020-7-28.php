<?php
class Item
{
	public $car1;
	public $car2;

	public function setCar1($val) {
		$this->car1 = $val;
	}

	public function setCar2($val) {
		$this->car2 = $val;
	}
}

$Items = array();
$Items[0] = new Item();
$Items[1] = new Item();
$Items[2] = new Item();

$Items[0]->setCar1(1.1);
$Items[0]->setCar2(11);
$Items[1]->setCar1(2.2);
$Items[1]->setCar2(22);
$Items[2]->setCar1(3.3);
$Items[2]->setCar2(33);

// 正常业务逻辑
// $count = 0;
// foreach ($Items as $Item) {
// 	$count += $Item->car1 * $Item->car2;
// }

// 封装一
// $initVal = 0;
// $callback = function($count, $item) {
// 	return $count += $item->car1 * $item->car2;
// };

// $count = $initVal;
// foreach ($Items as $item) {
// 	$count = $callback($count, $item);
// }

// 封装一的封装
function reduce($items, $callback, $initVal) {
	$count = $initVal;
	foreach ($items as $item) {
		$count = $callback($count, $item);
	}
	return $count;
}

$count = reduce($Items, function($count, $item){
	return $count + $item->car1 * $item->car2;
}, 0);

var_dump($count);
