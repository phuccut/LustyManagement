<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("BaseRepositories.php");

class TaiKhoanRepository extends BaseRepositories
{
	protected $_TaiKhoanModel;
	public function __construct()
	{
		$this->_table = "taikhoan";
		parent::__construct();
		include_once(APPPATH."models/TaiKhoanModel.php");
		$this->_TaiKhoanModel = new TaiKhoanModel();
	}

	public function DangNhap($data)
	{	
		$MatKhauMD5 = md5($data['MatKhau']);
		$data['MatKhau'] = hash('sha256',$MatKhauMD5);
		return $this->_TaiKhoanModel->DangNhap($data);
	}

	public function GetThongTin($TenDangNhap)
	{
		return $this->_TaiKhoanModel->GetThongTin($TenDangNhap);
	}
}
