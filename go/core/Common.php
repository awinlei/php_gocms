<?php
/**
 * 提供基础操作，封装数据
 * @authors [Wanglilei]
 * @email [awinlei@gmail.com]
 * @link [https://github.com/awinlei]
 * @encoding   [UTF-8]
 * @date    2014-11-03 16:58:27
 * @file   []
 */

class Common
{
	//获得配置文件
	public static function getConfigPath($config_name='mysql') {
		$class_path = $config_name . '.inc.php';
		$class_path = CONFIG_PATH . $class_path;
		return $class_path;
	}

	//获得数据驱动文件
	public static function getDbDriverPath($driver_name='mysql') {
		$driver_path = '/driver/'.ucfirst($driver_name) . '.php';
		$driver_path = CORE_PATH . $driver_path;
		return $driver_path;
	}

	//获得文件名称
	public static function getModelName($name='mysql') {
		return "{$name}_Model";
	}

	/**
	 * url导向
	 * @param str url	地址
	**/
	public static function url_redirect($url){
		header("Location: {$url}");
		echo "<meta http-equiv=refresh content='0; url={$url}'>";
		exit();
	}
	
}