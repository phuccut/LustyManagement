<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("BaseRepositories.php");

class NganSachRepository extends BaseRepositories
{
	public function __construct()
	{
		$this->_table = "ngansach";
		parent::__construct();
	}
}
