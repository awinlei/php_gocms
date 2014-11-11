<?php
/**
 *@desc	  核心类 提供autoload,常用对象加载方法
 *@author wanglil@youzu.com
 *@version 2014-5-20
 *@filesource Core.php
 *@global   UTF-8
 */


class GoCore
{
	protected static $_instances = array();
	protected $_classes = null;
	protected $_controller = '';
	protected $_command = '';

	protected function __construct(){
		$this->_classes = array(
			'Common' => CORE_PATH.'/Common.php',		 	// 基类
			'Controller' => CORE_PATH.'/Controller.php',	// 控制层
			'Model' => CORE_PATH.'/Model.php', 	        	// 数据层
			'View' => CORE_PATH.'/View.php', 	            // 显示层
		);

		$this->register_autoload();
		$this->register_shutdown();
		$this->session_start();
		// $this->debug();
	}

	/**
	 * 析构函数 解除对象引用
	 */
	public function __destruct(){
		$this->close();
	}
	/**
	 * 获取实例对象
	 */
	public static function getInstance($instance=''){
		if(!$instance){
			$instance = __CLASS__;
		}
		if(!isset(self::$_instances[$instance])){
			self::setInstance($instance, new $instance());
		}
		return self::$_instances[$instance];
	}

	public static function setInstance($instance, $obj){
		self::$_instances[$instance] = $obj;
	}

	public static function delInstance($instance){
		if(isset(self::$_instances[$instance])){
			unset(self::$_instances[$instance]);
		}
	}
	/**
	 * 将函数注册到SPL __autoload函数栈中。如果该栈中的函数尚未激活，则激活它们。 
	 */
	public function register_autoload(){

		return spl_autoload_register(array($this,'load_class'));
	}
	/**
	 * 没有返回值
	 */
	public function register_shutdown(){
		register_shutdown_function(array($this,'close'));
	}

	public function load_class($className, $path='', $isFullPath=false){
		if(isset($this->_classes[$className])){
			require($this->_classes[$className]);
			return true;
		}
		if(!$path){
			$path = CORE_PATH;
		}
		if($isFullPath){
			$file = $className . '.php';
		}else{
			$file = str_replace('_', '/', $className) . '.php';
		}
		$classFile = $path.'/'.$file;
		if(true && is_file($classFile)){
			require($classFile);
		}else{
			return false;
		}
		return true;
	}
	/**
	 * $_GET变量接受所有以get方式发送的请求，及浏览器地址栏中的?之后的内容
	 * $_POST变量接受所有以post方式发送的请求，例如，一个form以method=post提交，提交后php会处理post过来的全部变量
	 * $_REQUEST支持两种方式发送过来的请求，即post和get它都可以接受，显示不显示要看传递方法，get会显示在url中（有字符数限制），post不会在url中显示，可以传递任意多的数据（只要服务器支持）
	 * @return [type] [description]
	 */
	protected function parser_dispatch(){
		$controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'Main';
		$command = isset($_REQUEST['command']) ? $_REQUEST['command'] : 'index';

		file_put_contents(LOG_PATH."/uri.log",var_export($_REQUEST,true)."\n",FILE_APPEND);
		file_put_contents(LOG_PATH."/uri.log",var_export($_POST,true)."\n",FILE_APPEND);

		$this->_controller = ucfirst($controller);
		$this->_command = $command;
		
	}

	public function session_start(){
		session_start();
	}

	public function session_close(){
		session_write_close();
	}

	public function close(){
		$this->session_close();
	}

	public function debug(){
		file_put_contents(LOG_PATH."/core.log","\n++++++++++++++++++++++++++++++\n",FILE_APPEND);
		file_put_contents(LOG_PATH."/core.log",var_export(debug_backtrace(),true),FILE_APPEND);
		file_put_contents(LOG_PATH."/core.log","\n------------------------------\n",FILE_APPEND);
	}

}
