<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("IBaseModel.php");

class BaseModel extends CI_Model
{
	protected $_table;

	public function __construct($table = '')
	{
		parent::__construct();
		$this->_table = $table;
	}
	
	Public function GetAll()
	{
		return $this->db->get($this->_table)->result_array();
	}

	Public function Insert($obj)
	{
		return $this->db->insert($this->_table,$obj);
	}

	Public function GetById($id)
	{
		return $this->db->get_where($this->_table,['MaInt'=>$id])->row_array();
	}

	Public function Update($obj)
	{
		$where = array('MaInt'=>$obj['MaInt']);
		unset($obj->MaInt);
		return $this->db->update($this->_table,$obj,$where);
	}

	public function GetLastRow()
	{
		$query = "select MaInt from sanpham order by MaInt DESC limit 1";
		$result = $this->db->query($query);
		return $result->row_array();
	}
}
