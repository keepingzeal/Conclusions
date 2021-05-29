<?php

class DelayQueue {

	public $prefix = 'delay_queue:';
	public $redis = null;
	public $key = '';

	public function __construct($queue, $config = []) {
		$this->key = $this->prefix . $queue;
		$this->redis = new Redis();
		$this->redis->connect($config['host'], $config['port'], $config['timeout']);
		// $this->auth($config['auth']);
	}

	public function delTask($value) {
		return $this->redis->zRem($this->key, $value);
	}

	public function getTask() {
		return $this->redis->zRangeByScore($this->key, 0, time(), ['limit'=>[0,1]]);
	}

	public function addTask($name, $time, $data) {
		return $this->redis->zAdd(
			$this->key,
			$time,
			json_encode([
				'task_name'	=> $name,
				'task_data'	=> $data,
				'task_time'	=> $time,
			])
		);
	}

	public function run() {
		$task = $this->getTask();
		if (empty($task) || empty($task[0])) {
			echo '无数据';
			return false;
		}
		$task = $task[0];
		if ($this->delTask($task)) {
			$task = json_decode($task, true);

			// 处理任务
			var_dump($task);
			return true;
		}
		return false;
	}
}



class delayQueue2
{
	public $redis;
	public $prefix = 'delay_queue:';
	public $key = '';

	public function __construct($key_name, $config = []){
		$this->key = $this->prefix . $key_name;
		$this->redis = new Redis();
		$this->redis->connect($config['host'], $config['port'], $config['timeout']);
	}

	public function delTast($value) {
		return $this->redis->zRem($this->key, $value);
	}

	public function getTast() {
		return $this->redis->zRangeByScore($this->key, 0, time(), ['limit'=>[0,1]]);
	}

	public function addTask($time, $data) {
		$this->redis->zAdd($this->key, time(), is_array($data) ? json_encode($data) : $data);
	}

	public function run() {
		$task = $this->getTast();
		if (empty($task) || empty($task[0])) {
			echo '空数据';
			return false;
		}

		$task = $task[0];
		if ($this->delTast($task)) {
			//处理数据
			
			var_dump($task);
			return true;
		}
		return false;
	}
}


$dq = new DelayQueue2('close_order999', [
	'host'	=>	'127.0.0.1',
	'port'	=>	'6379',
	'auth'	=>	'',
	'timeout'	=>	60,
]);

// $dq->addTask(time() + 30, 111);
// $dq->addTask(time() + 40, 222);
// $dq->addTask(time() + 50, 333);


// $dq2 = new DelayQueue('close_order', [
//     'host' => '127.0.0.1',
//     'port' => 6379,
//     'timeout' => 60,
// ]);
 
// while (true) {
    $dq->run();
    // usleep(100000);
// }