<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("BaseRepositories.php");

class MauSacRepository extends BaseRepositories
{
	public function __construct()
	{
		$this->_table = "mausac";
		parent::__construct();
	}
}
