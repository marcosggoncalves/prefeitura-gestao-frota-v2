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
	public function count_veiculos()
	{
		return $this->db->count_all_results('veiculos');
	}
	public function veiculos($inicio,$maximo){
		$this->db->select('*');
		$this->db->from('veiculos');
		$this->db->join('categoria','veiculos.id_categoria = categoria.id_categoria');
		$this->db->order_by('id_veiculo','desc');
		$this->db->limit($inicio,$maximo);
		return $this->db->get()->result();
	}
	public function deletar_veiculo($id)
	{
		return $this->db->delete('veiculos',array('id_veiculo'=>$id));
	}
	public function veiculo($id)
	{
		$this->db->where('id_veiculo',$id);
		$this->db->select('*');
		$this->db->from('veiculos');
		$this->db->join('categoria','veiculos.id_categoria = categoria.id_categoria');
		return $this->db->get()->result();
	}
	public function editar_veiculos($campos,$id)
	{
		$this->db->set($campos);
		$this->db->where('id_veiculo',$id);
		return $this->db->update('veiculos');
	}
}