<?php
/**
 *@desc	控制器 提供逻辑转发等
 *@author wanglil@youzu.com
 *@version 2014-5-20
 *@filesource Action.php
 *@global   UTF-8
 */
class Controller
{
	protected $_view;
	protected $_model = array();
	protected $_view_folder;
	/**
	 * 构造函数
	 */
	public function __construct(){
		//初始化显示
		$this->_view = GoCore::getInstance("View");
	}
	/**
	 * 析构函数 解除对象引用
	 */
	public function __destruct(){
		$this->flush_model();
		unset($_model);
	}
	/**
	 * 获取逻辑控制器对象
	 */
	protected function get_model($conName, $isOne=false){

		$conName = Common::getModelName($conName);

		if($isOne){
			return new $conName();
		}
		
		if(!isset($this->_model[$conName])){
			$this->_model[$conName] = 0;
		}
		$this->_model[$className]++;

		//先加载model文件
		GoCore::getInstance()->load_class($conName,MODEL_PATH,true);
		
		return  GoCore::getInstance($conName);
	}
	/**
	 * 释放逻辑控制器对象
	 */
	protected function flush_model(){
		foreach($this->_model as $conName => $count){
			GoCore::delInstance($conName);
		}
	}
}