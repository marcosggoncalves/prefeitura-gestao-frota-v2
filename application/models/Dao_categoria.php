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
	public function count_categoria(){
		return $this->db->count_all_results('categoria');
	}
	public function categorias($inicio,$maximo)
	{
		$this->db->limit($inicio,$maximo);
		$this->db->order_by('id_categoria','desc');
		return $this->db->get('categoria')->result();
	}
	public function categoria($id)
	{
		$this->db->where('id_categoria',$id);
		return $this->db->get('categoria')->result();
	}
	public function deletar_categoria($id)
	{
		return $this->db->delete('categoria',array('id_categoria' =>$id));
	}
	public function editar_categoria($id,$campos)
	{
		$this->db->set($campos);
		$this->db->where('id_categoria',$id);
		return $this->db->update('categoria');
	}
}