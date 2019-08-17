<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_produto extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function salvar_produto($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('produtos');
	}
	public function count_produtos(){
		return $this->db->count_all_results('produtos');
	}
	public function deletar_produto($id)
	{
		return $this->db->delete('produtos',array('id_produto'=>$id));
	}
	public function produtos($inicio,$maximo)
	{
		$this->db->limit($inicio,$maximo);
		$this->db->order_by('id_produto','desc');
		return $this->db->get('produtos')->result();
	}
	public function produto($id)
	{
		$this->db->where('id_produto',$id);
		return $this->db->get('produtos')->result();
	}
	public function editar_produto($id,$campos)
	{
		$this->db->set($campos);
		$this->db->where('id_produto',$id);
		return $this->db->update('produtos');
	}
}