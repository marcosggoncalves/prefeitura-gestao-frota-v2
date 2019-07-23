<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_login extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function entrar($user,$senha){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nome_usuario',$user);
		$this->db->where('senha_usuario',$senha);
		return $this->db->get()->result();
	}
}