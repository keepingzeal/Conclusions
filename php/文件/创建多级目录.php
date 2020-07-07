<?php
// 创建多级目录
function createDir($path, $mode = 0777) {
	if (is_dir($path)) {
		return false;
	}
	if (mkdir($path, $mode, true)) {
		return true;
	}
	return false;
}

createDir('../TestField/TestFieldC1/t23');


// 练习
// is_dir()
// mkdir(path, mode, bool[允许递归创建])

function createDir($path, $mode) {
	if (!is_dir($path)) {
		return false;
	}
	if (!mkdir($path, $mode, true)) {
		return false;
	}
	return true;
}

