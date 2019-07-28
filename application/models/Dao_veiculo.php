<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_veiculo extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function salvar_veiculo($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('veiculos');
	}
	public function categorias()
	{
		return $this->db->get('categoria')->result();
	}
}