<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dao_manuntencao extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function count_saida_manuntencao()
	{
		return $this->db->count_all_results('saida_para_manuntencao');
	}
	public function todas_saida_manuntencao($inicio,$maximo)
	{
		$this->db->select('*');
		$this->db->from('saida_para_manuntencao');
		$this->db->join('veiculos','saida_para_manuntencao.id_veiculo = veiculos.id_veiculo');
		$this->db->order_by('saida_para_manuntencao.id_saida_manuntencao','desc');
		$this->db->limit($inicio,$maximo); 
		return $this->db->get()->result();
	}
	public function mudar_status($id,$status)
	{
		$this->db->set('status',$status);
		$this->db->where('id_veiculo',$id);
		return $this->db->update('veiculos');
	}
	public function mudar_status_por_placa($placa,$status)
	{
		$this->db->set('status',$status);
		$this->db->where('placa_veiculo',$placa);
		return $this->db->update('veiculos');
	}
	public function saida_manuntencao($id)
	{
		$this->db->where('id_saida_manuntencao',$id);
		$this->db->select('*');
		$this->db->from('saida_para_manuntencao');
		$this->db->join('veiculos','saida_para_manuntencao.id_veiculo = veiculos.id_veiculo');
		return $this->db->get()->result();
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
	public function deletar_saida_manuntencao($id)
	{
		return $this->db->delete('saida_para_manuntencao',array('id_saida_manuntencao'=>$id));
	}
	public function alterar_status_saida_manuntencao($id,$status)
	{
		$this->db->set('status',$status);
		$this->db->where('id_saida_manuntencao',$id);
		return $this->db->update('saida_para_manuntencao');
	}

	public function finalizar_saida_manuntencao($campos,$id)
	{
		$this->db->set($campos);
		$this->db->where('id_saida_manuntencao',$id);
		return $this->db->update('saida_para_manuntencao');
	}
}