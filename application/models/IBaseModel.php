<?php
defined('BASEPATH') OR exit('No direct script access allowed');

interface IBaseModel
{
    public function GetAll();
    public function GetById($id);
    public function Insert($obj);
    public function Update($obj);
    public function GetLastRow();
}
?>