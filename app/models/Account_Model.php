<?php
/**
 * 基础账号model类
 * 主要是增删改查
 * @authors [Wanglilei]
 * @email [awinlei@gmail.com]
 * @link [https://github.com/awinlei]
 * @encoding   [UTF-8]
 * @date    2014-11-10 17:23:58
 * @file   []
 */

class Account_Model extends Model{

	// 构造函数
	public function __construct() {
		parent::__construct ();//继承父类的构造函数
		$this->set_table("account");//设置表名
		$this->ping();
	}
	/**
	 * 查询
	 */
	public function get($uid){
		$sqlStr = "select * from {$this->table_name} where uid = {$uid}";
		$data = $this->get_one($sqlStr);
		print_r($data);
		exit;
	}

	/**
	 * 插入
	 */
	public function add($dataArr){
		$uid = $this->add_one($this->table_name,$dataArr);
		echo $uid; 
	}

	/**
	 * 更新
	 */
	public function update($uid,$params){
		foreach($params as $key => $val){
			$val = is_array($val)? serialize($val) : $val;
			$update_param .= is_numeric($val)? "{$key}={$val}," : "{$key}='{$val}',";
		}
		$update_param = rtrim($update_param,",");

		$sqlStr = "update {$this->table_name} set {$update_param} where uid = {$uid}";
		$this->query($sqlStr);
		if($this->affected_rows() > 0){
			echo 'success';
		}
	}

	/**
	 * 删除
	 */
	public function delete($uid){
		$sqlStr = "delete from {$this->table_name} where uid = {$uid}";
		echo $sqlStr;
		$this->query($sqlStr);
		if($this->affected_rows() > 0){
			echo 'success';
		}
	}

}