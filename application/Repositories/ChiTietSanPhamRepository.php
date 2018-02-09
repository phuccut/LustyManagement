<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("BaseRepositories.php");

class ChiTietSanPhamRepository extends BaseRepositories
{
	public function __construct()
	{
		$this->_table = "chitietsanpham";
		parent::__construct();
	}

	public function InsertChiTiet($obj,$chiTietObj)
	{
                include_once("SanPhamRepository.php");
                $sanPhamRepository = new SanPhamRepository();
                $objSanPham = array('MaChar' => 'X',
                		'TenSanPham' => $obj['TenSanPham'],
                	        'MoTa' => $obj['MoTa'],
                		'LoaiSanPham' => $obj['LoaiSanPham']
                		);
                $sanPhamRepository->Insert($objSanPham);
                $maSanPham = $this->GetLastRow()['MaInt'];
                foreach ($chiTietObj as $key => $value)
                {
                        $objChiTietSanPham = array('MaSanPham' => $maSanPham,
                                'MaMau' => $chiTietObj[$key]['MaMau'],
                                'MoTa' => $obj['MoTa'],
                                'Gia' => $chiTietObj[$key]['Gia'],
                                'SoLuong' => $chiTietObj[$key]['SoLuong']
                                );
                        parent::Insert($objChiTietSanPham);
                }
	}
}
