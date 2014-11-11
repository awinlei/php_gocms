<?php
/**
 * 
 * @authors [Wanglilei]
 * @email [awinlei@gmail.com]
 * @link [https://github.com/awinlei]
 * @encoding   [UTF-8]
 * @date    2014-11-03 15:13:49
 * @file   []
 */
class Main extends Controller
{
	public function __construct(){
		parent::__construct();
		$this->_view_folder = strtolower(__CLASS__);
	}

    /**
     * 主界面
     */
    public function index(){
      //$s =   $this->get_model('Account');
      // $s->add(array('account'=>'wll','nick_name'=>'啦啦啦'));
      //$s->update(40257,array('nick_name'=>'哈哈哈'));
      // $s->get(1);
      // $s->delete(40527);
    	//$this->_view->push($data);
    	$this->_view->html_display($this->_view_folder."/main.tpl");
    }
    /**
     * 登录界面
     */
    public function login(){
        // $data['meta']='';
        $this->_view->init_header('header_login.tpl');
        // $this->_view->push($data);
        $this->_view->html_display($this->_view_folder."/login.tpl");
    }

    /**
     * 登录验证
     */
    public function sign_in(){
      var_dump($_POST);
      exit;
    }

    /**
     * 登出
     */
    public function logout(){

       Common::url_redirect("index.php?controller=Main&command=login");
    }
    /**
     * 注册
     */
    public function register(){

    }

}