<?php
/**
 *@desc   模板管理类,使用smarty模板管理
 *@author wanglil@youzu.com
 *@version 2014-6-19
 *@filesource Template.php
 *@global   UTF-8
 */
class View extends Smarty
{
	public $if_pagecache = false;
	public $cache_life = 3600;
	public function __construct(){
		parent::__construct();
		$this->config_dir 		= CONFIG_PATH;
		$this->compile_check	= true;
		$this->debugging		= false;
		$this->caching			= false;
		$this->compile_dir		= CACHE_PATH.'/templates_c';
		$this->template_dir		= VIEWS_PATH;
		$this->init();
	}
	public static function getInstance(){
		return GoCore::getInstance(__CLASS__);
	}
	/**
	 * 初始化页面，提前加载头尾等，可以从配置文件加载
	 */
	private function init(){
		$init_data = array('site_title'=>'gosite by goframework!');

		$this->push($init_data);
	}

	/**
	 * push数据
	 */
	public function push($data){
		foreach($data as $key=>$value){
			$this->assign($key,$value);
		}
	}
}