<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("BaseRepositories.php");

class NhatKyRepository extends BaseRepositories
{
	public function __construct()
	{
		$this->_table = "nhatky";
		parent::__construct();
	}
}
