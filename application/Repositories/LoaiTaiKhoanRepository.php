<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("BaseRepositories.php");

class LoaiTaiKhoanRepository extends BaseRepositories
{
	public function __construct()
	{
		$this->_table = "loaitaikhoan";
		parent::__construct();
	}
}
