<?php

class A {
    public $a = 0;
    public function index() {
        echo $this->a;
    }
}
 

$abc = new A();
$abc->a = 10;
$abc->index();

$def = $abc;
$def->a = 20;
$def->index();

$abc->index();