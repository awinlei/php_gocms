<?php
/**
 * mysql 驱动|数据库底层封装类
 * @authors [Wanglilei]
 * @email [awinlei@gmail.com]
 * @link [https://github.com/awinlei]
 * @encoding   [UTF-8]
 * @date    2014-11-04 14:17:52
 * @file   []
 */
class Mysql
{
	protected $host;
	protected $user;
	protected $password;
	protected $database;
	protected $newlink;
	protected $pconnect;
	
	protected $linkid = null;
	protected $queryid = null;
	
	protected $querystr = '';
	protected $errstr = '';

	public $record = null;//查询结果，其他地方调用，需要开放
	
	public function __construct($host, $user, $pass, $database, $pconnect=false){
		$this->host = $host;
		$this->user = $user;
		$this->password = $pass;
		$this->database = $database;
		$this->newlink = true;
		$this->pconnect = $pconnect;
	}
	
	public function __destruct(){
		$this->close();
	}
	/**
	 * 数据库连接
	 */
	public function connect(){
		if(is_null($this->linkid)){
			if($this->pconnect){
				$this->linkid = mysql_pconnect($this->host, $this->user, $this->password);
			}else{
				$this->linkid = mysql_connect($this->host, $this->user, $this->password, $this->newlink);
			}
			if(!$this->linkid){
				$this->linkid = null;
				return false;
			}
			mysql_query("set names 'utf8'", $this->linkid);
			mysql_select_db($this->database, $this->linkid);
		}
		return $this->linkid;
	}
	/**
	 * 释放内存
	 * @return [type] [description]
	 */
	public function free(){
		if(is_resource($this->queryid)){
			mysql_free_result($this->queryid);	
		}
		$this->queryid = null;
	}
	/**
	 * 关闭 MySQL 连接
	 */
	public function close(){
		if($this->linkid){
			mysql_close($this->linkid);
			$this->linkid = null;
		}
	}
	/**
	 * Ping 一个服务器连接，如果没有连接则重新连接 
	 */
	public function ping(){
		if($this->linkid == null){
			return $this->connect();
		}
		if(!mysql_ping($this->linkid)){
			$this->close();
			return $this->connect();
		}
		return true;
	}
	/*
	 * 执行sql
	 */
	public function query($str){
		if(!$str || !$this->connect()){
			return false;
		}
		if($this->queryid){
			$this->free();
		}
		$this->querystr = $str;
		$this->queryid = @mysql_query($this->querystr, $this->linkid);
		if(!$this->queryid){
			$this->errstr = mysql_error();
			if($this->errstr){
				//写入log
				file_put_contents(LOG_PATH."/mysqldebug.log","\n++++++++++++++++++++++++++++++\n",FILE_APPEND);
				file_put_contents(LOG_PATH."/mysqldebug.log","query sql:\n{$this->querystr}",FILE_APPEND);
				file_put_contents(LOG_PATH."/mysqldebug.log","\n++++++++++++++++++++++++++++++\n",FILE_APPEND);
				file_put_contents(LOG_PATH."/mysqldebug.log","mysql error:\n{$this->errstr}",FILE_APPEND);
				file_put_contents(LOG_PATH."/mysqldebug.log","\n++++++++++++++++++++++++++++++\n",FILE_APPEND);
			}

			$error_db = $this->database;
			$error_debug = '';
			$error_file = $_SERVER['SCRIPT_FILENAME'];
			file_put_contents(LOG_PATH.'/mysqlerror.log', "[".date("Y-m-d H:i:s")."]errno:".mysql_errno().";error:{$this->errstr};sql:{$this->querystr};File:{$error_file};DB:{$error_db};debug:{$error_debug}\n", FILE_APPEND);
			
			if($this->errstr == 'MySQL server has gone away'){
				$this->close();
				file_put_contents(LOG_PATH.'/mysqlerror.log', "[".date("Y-m-d H:i:s")."]".'MySQL server has gone away, reTry to query'.$str."\n", FILE_APPEND);
				return $this->query($str);
			}else{
				if($this->ping()){//再试一次
					$this->queryid = mysql_query($this->querystr, $this->linkid);
					if($this->queryid){
						return $this->queryid;
					}
				}
			}
			return false;
		}
		return $this->queryid;
	}
	/**
	 * 获得sql
	 */
	public function getQueryStr(){
		return $this->querystr;
	}
	/**
	 * 从结果集中取得一行作为关联数组 
	 */
	public function nextRecord(){
		if(!$this->queryid){
			return false;
		}
		$this->record = mysql_fetch_assoc($this->queryid);
		if(!$this->record){
			$this->free();
			return false;
		}
		return true;
	}
	/**
	 * 获得全部结果集
	 */
	public function getAll($sql){
		$rows = array();
		if($this->query($sql)){
			while($this->nextRecord()){
				$rows[] = $this->record;
			}
		}

		return $rows;
	}
	/**
	 * 取得上一步 INSERT 操作产生的 ID 
	 */
	public function getInsertId(){
		return mysql_insert_id($this->linkid);
	}
	/**
	 * 取得前一次 MySQL 操作所影响的记录行数 
	 */
	public function getAffectedRows(){
		return mysql_affected_rows($this->linkid);
	}
	/**
	 * 取得结果集中行的数目 
	 */
	public function getNumRows(){
		return mysql_num_rows($this->queryid);
	}
	/**
	 * 取得结果中指定字段的字段名 
	 */
	public function getNumFields(){
		return mysql_num_fields($this->queryid);
	}
	
	
}