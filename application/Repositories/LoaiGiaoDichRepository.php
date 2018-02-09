<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("BaseRepositories.php");

class LoaiGiaoDichRepository extends BaseRepositories
{
	public function __construct()
	{
		$this->_table = "loaigiaodich";
		parent::__construct();
	}
}
