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
	public function trocas_oleos($inicio,$maximo)
	{
		$this->db->select('*');
		$this->db->from('controle_troca_oleo');
		$this->db->join('veiculos','controle_troca_oleo.id_veiculo = veiculos.id_veiculo');
		$this->db->order_by('id_controle_troca_oleo','desc');
		$this->db->limit($inicio,$maximo);
		return $this->db->get()->result();
	}
	public function count_troca_oleo(){
		return $this->db->count_all_results('controle_troca_oleo');
	}
	public function deletar_troca($id)
	{
		return $this->db->delete('controle_troca_oleo',array('id_controle_troca_oleo'=>$id));
	}
	public function troca_oleo($id)
	{
		$this->db->where('id_controle_troca_oleo',$id);
		$this->db->select('*');
		$this->db->from('controle_troca_oleo');
		$this->db->join('veiculos','controle_troca_oleo.id_veiculo = veiculos.id_veiculo');
		$this->db->order_by('id_controle_troca_oleo','desc');
		return $this->db->get()->result();
	}
	public function troca_oleo_salvar($id,$km)
	{
		$this->db->set('km_troca',$km);
		$this->db->where('id_controle_troca_oleo',$id);
		return $this->db->update('controle_troca_oleo');
	}
}