<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_categoria extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function salvar_categoria($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('categoria');
	}
}