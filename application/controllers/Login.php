<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH."Repositories/TaiKhoanRepository.php");

class Login extends CI_Controller {

	protected $_data;
	protected $_repository;
	public function __construct(){
		parent::__construct();
		$this->_repository = new TaiKhoanRepository();
	}

	public function index()
	{
		if (isset($this->session->userdata['DangNhap']))
		{
			redirect(base_url('home'));
		}else
		{
			$this->load->view('login/index');
		}
	}

	public function Logging()
	{
		if (isset($this->session->userdata['DangNhap']))
		{
			redirect(base_url('home'));
		}else
		{
			$this->_data['XacThuc'] = array(
				'TenDangNhap' => $this->input->post('TenDangNhap'),
				'MatKhau' => $this->input->post('MatKhau')
			);
			$result = $this->_repository->DangNhap($this->_data['XacThuc']);
			if ($result == true)
			{
				$resultThongTin = $this->_repository->GetThongTin($this->_data['XacThuc']['TenDangNhap']);
				$session_ThongTin = array(
					'Ten' => $resultThongTin[0]->Ten,
					'TenDangNhap' => $resultThongTin[0]->TenDangNhap,
					'MaInt' => $resultThongTin[0]->MaInt
				);
				$this->session->set_userdata('DangNhap', $session_ThongTin);
				redirect(base_url('home'));
			}else
			{
				$this->_data['error'] = 'Đăng nhập thất bại';
				$this->load->view('login/index',$this->_data);
			}

		}
	}

	public function Logout()
	{
		$session_ThongTin = array(
			'Ten' => '',
			'TenDangNhap' => '',
			'Ma' => '',
			'MaInt' => ''
		);
		$this->session->unset_userdata('DangNhap', $sess_ThongTin);
		redirect(base_url('login'));
	}
}


?>