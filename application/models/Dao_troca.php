<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dao_troca extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function salvar_troca_oleo($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('controle_troca_oleo');
	}
	public function veiculos()
	{
		return $this->db->get('veiculos')->result();
	}
}