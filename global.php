<?php
/**
 * 全局配置文件
 * @authors [Wanglilei]
 * @email [awinlei@gmail.com]
 * @link [https://github.com/awinlei]
 * @encoding   [UTF-8]
 * @date    2014-11-03 12:05:41
 * @file   []
 */
$system_path = 'go';//核心文件目录
$app_path = 'app';//app文件目录
if(realpath($system_path) !== FALSE){
	$system_path = realpath($system_path).'/';
}
$system_path = rtrim($system_path, '/').'/';
// Is the system path correct?
if (!is_dir($system_path)){
	exit("Your system path wrong!");
}
define('BASEPATH', str_replace("\\","/",$system_path));

if(is_dir($app_path)){
	define('APPPATH',$app_path.'/');
}else{
	if(!is_dir(BASEPATH.$app_path.'/')){
		exit("Your app path wrong!");
	}
	define('APPPATH',BASEPATH.$app_path.'/');
}

define('CONTROLLER_PATH', APPPATH.'controllers/');//控制器
define('MODEL_PATH', APPPATH.'models/');//业务目录
define('VIEWS_PATH', APPPATH.'views/');//前端显示目录

define('CONFIG_PATH', APPPATH.'configs/');//配置文件目录

define('CACHE_PATH', APPPATH.'cache/'); //缓存目录
define('LIB_PATH',	APPPATH.'library/');//类库目录

define('LANGUAGE_PATH',	APPPATH.'language/');//多语言目录
define('LOG_PATH',APPPATH.'logs/');//日志目录

define('CORE_PATH',BASEPATH.'core/');//核心目录


require_once BASEPATH.'/Go.php';

require(LIB_PATH . '/smarty/Smarty.class.php');