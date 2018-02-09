<?php

class TaiKhoanModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct("taikhoan");
    }

    public function DangNhap($data)
    {
    	$condition = "TenDangNhap =" . "'" . $data['TenDangNhap'] . "' AND " . "MatKhau =" . "'" . $data['MatKhau'] . "'";
		$this->db->select('*');
		$this->db->from('taikhoan');
		$this->db->where($condition);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1)
		{
			return true;
		}else
		{
			return false;
		}
    }

    public function GetThongTin($TenDangNhap)
    {
    	$condition = "TenDangNhap =" . "'" . $TenDangNhap . "'";
		$this->db->select('*');
		$this->db->from('taikhoan');
		$this->db->where($condition);
		$this->db->limit(1);

		$query = $this->db->get()->result();

		return $query;
    }
}