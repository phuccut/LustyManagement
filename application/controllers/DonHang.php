<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."Repositories/DonHangRepository.php");

class DonHang extends CI_Controller {

	protected $_data;
	protected $_repository;

	public function __construct(){
		parent::__construct();
		$this->_repository = new DonHangRepository();
	}

	public function index()
	{
		$this->_data['subView'] = 'DonHang/index';
		$this->_data['subScript'] = 'DonHang/indexScript';
		$this->load->view('common/MainView',$this->_data);
	}

	public function ThemGiaoDich()
	{
		$this->_data['subView'] = 'DonHang/ThemDonHang';
		$this->_data['subScript'] = 'DonHang/ThemDonHangScript';
		$this->load->view('common/MainView',$this->_data);
	}

	public function GetAll()
	{
		$data = $this->_repository->GetAll();
		echo json_encode($data);
	}
}
