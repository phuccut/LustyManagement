<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."Repositories/GiaoDichRepository.php");

class GiaoDich extends CI_Controller {

	protected $_data;
	protected $_repository;

	public function __construct(){
		parent::__construct();
		$this->_repository = new GiaoDichRepository();
	}

	public function index()
	{
		if ( $this->input->post('LoaiGiaoDich') != null )
		{
			$giaoDich = array(
				'MoTa' => $this->input->post('MoTa'),
				'LoaiGiaoDich' => $this->input->post('LoaiGiaoDich'),
				'NganSach' => $this->input->post('NganSach'),
				'ThoiGian' => date("Y-m-d h:i:sa"),
				'TaiKhoan' => $this->session->userdata['DangNhap']['MaInt'],
				'SoTien' => $this->input->post('SoTien')
			);
			$this->_repository->Insert($giaoDich);
		}
		$this->_data['subView'] = 'GiaoDich/index';
		$this->_data['subScript'] = 'GiaoDich/GiaoDichScript';
		$this->load->view('common/MainView',$this->_data);
	}

	public function ThemGiaoDich()
	{
		$this->_data['subView'] = 'GiaoDich/ThemGiaoDich';
		$this->_data['subScript'] = 'GiaoDich/ThemGiaoDichScript';
		$this->load->view('common/MainView',$this->_data);
	}

	public function GetAll()
	{
		include_once(APPPATH."Repositories/TaiKhoanRepository.php");
		include_once(APPPATH."Repositories/LoaiGiaoDichRepository.php");
		include_once(APPPATH."Repositories/NganSachRepository.php");
 		$taiKhoanRepository = new TaiKhoanRepository();
		$loaiGiaoDichRepository = new LoaiGiaoDichRepository();
		$nganSachRepository = new NganSachRepository();
		$data = array();
		$data = $this->_repository->GetAll();

		foreach($data as $key => $value)
		{
		  $data[$key]['TaiKhoan'] = $taiKhoanRepository->GetById($data[$key]['TaiKhoan'])['TenDangNhap'];
		  $data[$key]['NganSach'] = $nganSachRepository->GetById($data[$key]['NganSach'])['TenNganSach'];
		  $data[$key]['LoaiGiaoDich'] = $loaiGiaoDichRepository->GetById($data[$key]['LoaiGiaoDich'])['TenLoaiGiaoDich'];
		}

		echo json_encode($data);
	}
}
