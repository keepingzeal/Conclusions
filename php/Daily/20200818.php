<?php


function isValidate($str) {
	$map = [
        ")" => "(",
        "}" => "{",
        "]" => "[",
    ];

	$stack = [];

	$len = strlen($str);

	if ($len <= 0) {
		return false;
	} 

	for ($i=0; $i < $len; $i++) {
		if ( isset($map[$str[$i]]) ) {
			if (isset($stack) && $stack[0] == $map[$str[$i]]) {
				array_shift($stack);
			}
		} else {
			array_unshift($stack, $str[$i]);
		}
	}

	if (count($stack) > 0) {
		return false;
	}
	return true;
}

var_dump(isValidate('()'));

