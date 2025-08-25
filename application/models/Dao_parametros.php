<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Dao_parametros extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_parametro($field)
	{
		$this->db->select($field);
		$this->db->from('parametros');
		$this->db->limit(1);
		return $this->db->get()->result();
	}
	public function editar_salvar($id,$campos)
    {
    	$this->db->set($campos);
    	$this->db->where('id_parametro  ', $id);
    	return $this->db->update('parametros');
    }
}
