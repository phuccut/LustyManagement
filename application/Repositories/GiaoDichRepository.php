<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("BaseRepositories.php");

class GiaoDichRepository extends BaseRepositories
{
	public function __construct()
	{
		$this->_table = "giaodich";
		parent::__construct();
	}
	
	public function Insert($obj)
	{
	    parent::Insert($obj);
        include_once("NganSachRepository.php");
        $nganSachRepository = new NganSachRepository();
        if ($obj['LoaiGiaoDich'] == 2)
        {
            $objNganSach = array(
                'MaInt' => 1,
                'SoTien' => $nganSachRepository->GetById(1)['SoTien'] + $obj['SoTien']
            );
            $nganSachRepository->Update($objNganSach);
        }else
        {
            $objNganSach = array(
                'MaInt' => 1,
                'SoTien' => $nganSachRepository->GetById(1)['SoTien'] - $obj['SoTien']
            );
            $nganSachRepository->Update($objNganSach);
        }
	}
}
