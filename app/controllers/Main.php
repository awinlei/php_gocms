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

    public function index(){
      $s =   $this->get_model('Account');
      $s->get();

      exit;
      echo "<pre>";debug_backtrace();
      echo "<pre>";debug_print_backtrace(); 
      var_dump($s);
      exit;
        $meta_array = array(
            '<meta charset="UTF-8" />',
            '<meta name="viewport" content="width=device-width, initial-scale=1.0" />',
            '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />',
            );
        $css_array = array(
            '<link rel="stylesheet" href="app/views/static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="app/views/static/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="app/views/static/css/fullcalendar.css" />
    <link rel="stylesheet" href="app/views/static/css/unicorn.main.css" />
    <link rel="stylesheet" href="app/views/static/css/unicorn.grey.css" class="skin-color" />',
            );
        $js_array = array(
            '<script src="app/views/static/js/jquery.min.js"></script>
    <script src="app/views/static/js/jquery.ui.custom.js"></script>
    <script src="app/views/static/js/bootstrap.min.js"></script>
    <script src="app/views/static/js/fullcalendar.min.js"></script>
    <script src="app/views/static/js/unicorn.js"></script>
    <script src="app/views/static/js/unicorn.calendar.js"></script>',
            );
        $data['meta']=$meta_array;
        $data['css']=$css_array;
        $data['js']=$js_array;
        $data['link']=$link_array;

        $data['view_file'] = $this->_view_folder."/main.tpl";

    	$this->_view->push($data);
    	$this->_view->display('index.tpl');
    }
    /**
     * 登录
     */
    public function login(){
         $meta_array = array(
            '<meta name="description" content="overview &amp; stats" />',
            '<meta name="viewport" content="width=device-width, initial-scale=1.0" />',
            '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />',
            '<meta name="author" content="">',
            );
        $css_array = array(
            '<link href="app/views/assets/css/bootstrap.min.css" rel="stylesheet" />',
            '<link href="app/views/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />',
            '<link rel="stylesheet" href="app/views/assets/css/font-awesome.min.css" />',
            '<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />',
            '<link rel="stylesheet" href="app/views/assets/css/ace.min.css" />',
            '<link rel="stylesheet" href="app/views/assets/css/ace-responsive.min.css" />',
            '<link rel="stylesheet" href="app/views/assets/css/ace-skins.min.css" />',
            );
        $js_array = array(
            '<script src="app/views/static/lib/jquery-1.7.2.min.js" type="text/javascript"></script>',
            );
        $data['meta']=$meta_array;
        $data['css']=$css_array;
        //$data['js']=$js_array;
        $data['link']=$link_array;

        $data['view_file'] = $this->_view_folder."/login.tpl";

        $this->_view->push($data);
        $this->_view->display('index.tpl');

    }
    /**
     * 登出
     */
    public function logout(){

    }
    /**
     * 注册
     */
    public function register(){

    }

}