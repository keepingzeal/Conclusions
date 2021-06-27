<?php
class Item
{
	public $email;
	public $name;

	public function setEmail($val) {
		$this->email = $val;
	}

	public function setName($val) {
		$this->name = $val;
	}
}


class Collection
{
	protected $items;

	public function __construct($items) {
		$this->items = $items;
	}

	public function map($callback) {
		return new static(array_map($callback, $this->items));
	}

	public function filter($callback) {
		return new static(array_filter($this->items, $callback));
	}

	public function toArray() {
		return $this->items;
	}
}

$Item = array();
$Item[0] = new Item();
$Item[1] = new Item();
$Item[2] = new Item();

$Item[0]->setEmail('E1111');
$Item[1]->setEmail('E2222');
$Item[1]->setName(2222);
$Item[2]->setEmail('E3333');
$Item[2]->setName(3333);


// 重构一
// function getEmail($items) {
// 	return array_map(function($item){
// 		return $item->email;
// 	}, array_filter($items, function($item){
// 		return $item->email != null;
// 	}));
// }

// 重构二
function getEmail($items) {
	return (new Collection($items))
	->filter(function($item){
		return $item->email != null;
	})
	->map(function($item){
		return $item->email;
	})
	->toArray();
}
var_dump(getEmail($Item));

