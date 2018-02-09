<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("BaseRepositories.php");

class DonHangRepository extends BaseRepositories
{
	public function __construct()
	{
		$this->_table = "donhang";
		parent::__construct();
	}
}
