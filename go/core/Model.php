<?php
/**
 * 数据库底层封装类[这里不区分数据处理和逻辑处理]
 * @authors [Wanglilei]
 * @email [awinlei@gmail.com]
 * @link [https://github.com/awinlei]
 * @encoding   [UTF-8]
 * @date    2014-11-04 14:17:52
 * @file   []
 */
class Model
{
	protected $group_name = '';
	protected $db_name = '';
	protected $table_name = '';
	protected static $db;
	
	protected static $_pingLastTime = 0;
	protected static $_pingWaitTime = 3600;

	protected $unsafe_str = "/(\s+union\s+|#)/i";


	public $records = null;//查询结果，其他地方调用，需要开放
	
	
	public function __construct(){
			$config_path = Common::getConfigPath();
			require($config_path);
			$this->_dbConnect();
	}

	private static function _dbConnect(){
		$driver_path = Common::getDbDriverPath();
		require($driver_path);
		self::$db = new Mysql(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_PCONNECT, true);
	}
	
	protected static function ping(){
		$time = time();
		if(self::$_pingLastTime + self::$_pingWaitTime > $time){
			return true;
		}
		self::$_pingLastTime = $time;
		if(!self::$db->ping()){
			file_put_contents(LOG_PATH . "/mysqlping.log", "[".date("Y-m-d H:i:s")."] Ping false!;\n", FILE_APPEND);
		}
	}
	protected static function close(){
		self::$db->close();
	}

	//设置表名
	protected function set_table($table_name){
		$this->table_name = $table_name;
	}

	//检测sql语句
	protected function checkQuery($sql){
		if(preg_match($this->unsafe_str, $sql)){
			return false;
		}
		return true;
	}
	//执行sql
	public function query($sql){
		$ret = false;
		if($this->checkQuery($sql)){
			$ret = self::$db->query($sql);
		}else{
			file_put_contents(LOG_PATH . "/mysqlerror.log", "[".date("Y-m-d H:i:s")."] invalid SQL!;\n", FILE_APPEND);
		}
		return $ret;
	}

	//获得结果集
	protected function get_record(){
		return $this->records;
	}

	protected function next_record($db=''){
		$ret = self::$db->nextRecord();
		$this->records = self::$db->record;
		return $ret;
	}
	
	protected function affected_rows($db=''){
		return self::$db->getAffectedRows();
	}
	
	protected function insertid($db=''){
		return self::$db->getInsertId();
	}
	
	protected function get_field($name){
		if(isset($this->records[$name])){
			return $this->records[$name];
		}
		return false;
	}


	/*
	 * 	获得一条数据
	 */
	public function get_one($sql){
		$data = array();
		$this->query($sql);
		if($this->next_record()){
			$data = $this->get_record();
		}
		return $data;
	}
	/*
	 *	获取一个结果集
	 */
	public function get_all($sql){
		$data = array();
		$this->query($sql);
		while($this->next_record()){
			$data[] = $this->get_record();
		}
		if(empty($data)){
			$data = array();
		}
		return $data;
	}
	/*
	 * 封装insert SQL
	 */
	public function add_one($table_name,$key_value){
		$fileds = '';
		$values = '';
		foreach ($key_value as $key => $val){
			if(!empty($key)){
				$fields .= ",{$key}";
			}
			if(is_string($val)){
				$val = addslashes($val);
			}
			if(is_array($val)){
				$val = serialize($val);
			}
			$values .= is_numeric($val)? ",{$val}" : ",'{$val}'";
		}
		$fields = ltrim($fields,",");
		$values = ltrim($values,",");
		$sql = "insert into {$table_name}({$fields}) values({$values})";
		$this->query($sql);
		return $this->insertid();
	}

}