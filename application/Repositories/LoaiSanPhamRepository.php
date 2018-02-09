<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("BaseRepositories.php");

class LoaiSanPhamRepository extends BaseRepositories
{
	public function __construct()
	{
		$this->_table = "loaisanpham";
		parent::__construct();
	}
}

