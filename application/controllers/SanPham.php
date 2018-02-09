<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."Repositories/ChiTietSanPhamRepository.php");

class SanPham extends CI_Controller {

	protected $_data;
	protected $_repository;
	protected $_mauSacRepository;
	protected $_sanPhamRepository;
	protected $_loaiSanPhamRepository;

	public function __construct(){
		parent::__construct();
		$this->_repository = new ChiTietSanPhamRepository();
		include_once(APPPATH."Repositories/MauSacRepository.php");
		include_once(APPPATH."Repositories/SanPhamRepository.php");
		include_once(APPPATH."Repositories/LoaiSanPhamRepository.php");
		$this->_mauSacRepository = new MauSacRepository();
		$this->_sanPhamRepository = new SanPhamRepository();
		$this->_loaiSanPhamRepository = new LoaiSanPhamRepository();
	}

	public function index()
	{
		if ( $this->input->post('LoaiSanPham') != null )
		{
			$sanPham = array(
				'TenSanPham' => $this->input->post('TenSanPham'),
				'LoaiSanPham' => $this->input->post('LoaiSanPham'),
				'MoTa' => $this->input->post('MoTa'),
				'ThoiGian' => date("Y-m-d h:i:sa"),
				'TaiKhoan' => $this->session->userdata['DangNhap']['MaInt']
			);
			$chiTietSanPham = array();
			for ($i = 0; $i < count($_POST['MauSac']); $i++ )
			{
				$chiTietSanPham[$i]["MaMau"] = $this->input->post('MauSac')[$i];
				$chiTietSanPham[$i]["SoLuong"] = $this->input->post('SoLuong')[$i];
				$chiTietSanPham[$i]["Gia"] = $this->input->post('Gia')[$i];
			}
			$this->_repository->InsertChiTiet($sanPham,$chiTietSanPham);
		}
		$this->_data['subView'] = 'SanPham/index';
		$this->_data['subScript'] = 'SanPham/indexScript';
		$this->load->view('common/MainView',$this->_data);
	}

	public function ThemSanPham()
	{
		$this->_data['subView'] = 'SanPham/ThemSanPham';
		$this->_data['loaiSanPham'] =  $this->_loaiSanPhamRepository->GetAll();
		$this->_data['mau'] =  $this->_mauSacRepository->GetAll();
		$this->_data['subScript'] = 'SanPham/ThemSanPhamScript';
		$this->load->view('common/MainView',$this->_data);
	}

	public function GetAll()
	{
		$data = array();
		$data = $this->_repository->GetAll();

		foreach($data as $key => $value)
		{
		  $data[$key]['TenSanPham'] = $this->_sanPhamRepository->GetById($data[$key]['MaSanPham'])['TenSanPham'];
		  $data[$key]['LoaiSanPham'] = $this->_loaiSanPhamRepository->GetById($this->_sanPhamRepository->GetById($data[$key]['MaSanPham'])['LoaiSanPham'])['TenLoaiSanPham'];
		  $data[$key]['TenMau'] = $this->_mauSacRepository->GetById($data[$key]['MaMau'])['TenMau']; 
		}

		echo json_encode($data);
	}
}
