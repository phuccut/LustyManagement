<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."Repositories/ChiTietDonHangRepository.php");

class DonHang extends CI_Controller {

	protected $_data;
	protected $_repository;

	public function __construct(){
		parent::__construct();
		$this->_repository = new ChiTietDonHangRepository();
	}

	public function GetById($id = null)
	{
		$data = $this->_repository->GetById($id);
		echo json_encode($data);
	}
}
