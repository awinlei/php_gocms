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
	public $header_content = '';
	public $footer_content = '';

	public function __construct(){
		parent::__construct();
		$this->config_dir 		= CONFIG_PATH;
		$this->compile_check	= true;
		$this->debugging		= false;
		$this->caching			= false;
		$this->compile_dir		= CACHE_PATH.'/templates_c';
		$this->template_dir		= VIEWS_PATH;
		//初始化站点信息[可读取配置文件]
		$this->init();
	}
	public static function getInstance(){
		return GoCore::getInstance(__CLASS__);
	}
	/**
	 * 初始化页面，提前加载头尾等，可以从配置文件加载
	 */
	private function init(){
		$init_data = array(
			'site_title'=>'GO',
			'site_domain'=>'http://svn.com',
			'static_path'=>'http://svn.com/'.VIEWS_PATH."static/",
			);

		$this->push($init_data);
		$this->init_header();
		$this->init_footer();
	}

	//获取header   暂时不显示
	public function init_header($header_tpl = 'header.tpl'){
		$this->header_content =  $this->fetch($header_tpl);
	}
	//获取footer 暂时不显示
	public function init_footer($footer_tpl = 'footer.tpl'){
		$this->footer_content = $this->fetch($footer_tpl);
	}
	/**
	 * push 主体数据
	 */
	public function push($data){
		foreach($data as $key=>$value){
			$this->assign($key,$value);
		}
	}
	/**
	 * 显示调用的网页内容
	 * @param  [type] $content_tpl [description]
	 * @return [type]              [description]
	 */
	public function html_display($content_tpl){
		echo $this->header_content;
		$this->display($content_tpl);
		echo $this->footer_content;

	}
}