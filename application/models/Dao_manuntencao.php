<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dao_manuntencao extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function salvar_saida_manuntencao($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('saida_para_manuntencao');
	}
	public function all_veiculos_status($status)
	{
		$this->db->select('*');
		$this->db->from('veiculos');
		$this->db->join('categoria','veiculos.id_categoria = categoria.id_categoria');
		$this->db->where('status_categoria',$status);
		return $this->db->get()->result();
	}
}