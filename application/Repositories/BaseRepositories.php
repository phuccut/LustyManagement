<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once("IBaseRepositories.php");


class BaseRepositories implements IBaseRepositories
{
	protected $_table;
	protected $_model;

	public function __construct()
	{
		$this->_model = new BaseModel($this->_table);
	}

	Public function GetAll()
	{
		return $this->_model->GetAll($this->_table);
	}

	public function GetById($Id)
	{
		return $this->_model->GetById($Id);
	}

	public function Insert($obj)
	{
		return $this->_model->Insert($obj);
	}

	public function Update($obj)
	{
		return $this->_model->Update($obj);
	}

	public function Delete($Id)
	{
		$obj = $this->_model->GetById($Id);
		$obj['Xoa'] = 1;
		return $this->_model->Update($obj);
	}

	public function GetLastRow()
	{
		return $this->_model->GetLastRow();
	}
}
