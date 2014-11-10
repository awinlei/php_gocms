<?php
/**
 * 账号model
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
		parent::__construct ();
		$this->ping();
	}

	public function get(){
		$sql = "CREATE TABLE `lottery` (
  `lottery_id` int(11) NOT NULL COMMENT '期号',
  `num` int(11) NOT NULL COMMENT '奖中号码',
  `gold` int(11) NOT NULL COMMENT '奖池黄金',
  `r_gold` int(11) NOT NULL COMMENT '中奖黄金数',
  PRIMARY KEY (`lottery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";
	if($this->checkQuery($sql)){
		$this->query($sql);
	}
	}
}