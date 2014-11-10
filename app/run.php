<?php

class TestThreadsRun extends Thread
{
	protected $url;
	protected $data;

	public function __construct($url){
		$this->url = $url;
	}

	public function run($url){
		if($url = $this->url){
			$this->data = model_http_curl_get($url);
		}
	}
}

class A
{
	public function model_thread_result_get($urls_array){
		foreach ($urls_array as $key => $value){
			$thread_array[$key] = new TestThreadsRun($value['url']);
			$thread_array[$key]->start();
		}

		foreach ($thread_array as $tkey => $tvalue) {
			while($thread_array[$tkey]->isRunning()){
				usleep(10);
			}
			if($thread_array[$tkey]->join()){
				$dataArr[$tkey] = $thread_array[$tkey]->data;
			}
		}
		return $dataArr;
	}

	public function model_http_curl_get($url,$userAgent=""){
		$userAgent = $userAgent ? $userAgent : 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.2)';
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 5);
		curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
		$result = curl_exec($curl);
		curl_close($curl);
		return $result;
	}

	public function start(){
		for($i=0;$i<5;$i++){
			$urls_array[] = array('name'=>'taobao','url'=> "http://zyan.cc/page/1/".mt_rand(10000,20000));
		}

		$t = microtime(true);
		$result = $this->model_thread_result_get($urls_array);
		$e = microtime(true);
		echo "multi threads:",$e-$t,"\n";

		$t = microtime(true);
		foreach ($urls_array as $key => $value) {
			$result_new[$key] = $this->model_http_curl_get($value['url']);
		}
		$e = microtime(true);
		echo "For section: ",$e-$t,"\n";
	}
}

$a = new A();

$a->start();

