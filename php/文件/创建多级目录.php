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
