<?php
/**
 * 程序入口
 * @authors [Wanglilei]
 * @email [awinlei@gmail.com]
 * @link [https://github.com/awinlei]
 * @encoding   [UTF-8]
 * @date    2014-11-03 12:05:41
 * @file   []
 */
define("ROOT_DIR",dirname(__FILE__));
require(ROOT_DIR.'/global.php');

class Index extends GoCore{
	public function __construct(){
		parent::__construct();
		//初始化
		GoCore::setInstance('GoCore',$this);
		//加载模块[依据权限增加模块，还未实现]
		$this->_classes['Main'] = CONTROLLER_PATH."/Main.php";
		// print_r($this->_classes);exit;
	}

	public function dispatch($entrance='dispatch'){
		$this->parser_dispatch();
		if(!$this->_controller || !isset($this->_classes[$this->_controller]) || !$this->load_class($this->_controller,CONTROLLER_PATH,true)){
			exit('error controller');
		}

		$controller_class = $this->_controller;
		$controller = new $controller_class();

		if(!$this->_command || !method_exists($controller,$this->_command)){
			exit('error command');
		}
		call_user_func(array($controller,$this->_command));
	}
}

$objIndex = new Index();
$objIndex->dispatch();