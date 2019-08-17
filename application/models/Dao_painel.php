<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Dao_painel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function count_register($tabela)
	{
		return $this->db->count_all($tabela);
	}
	public function count_register_where($tabela,$condition,$where)
	{
		$this->db->where($condition, $where);
		return $this->db->count_all_results($tabela);
	}
	public function recent_maintenances()
	{
		$this->db->select('*');
		$this->db->from('saida_para_manuntencao');
		$this->db->join('veiculos','saida_para_manuntencao.id_veiculo = veiculos.id_veiculo');
		$this->db->where('status','Aberto');
		$this->db->order_by("data_saida_veiculo", "desc");
		$this->db->limit(10);
		return $this->db->get()->result();
	}
	public function products_retirado()
	{
		$this->db->select('*');
		$this->db->from('controle_saida_entrada_produtos');
		$this->db->join('produtos','controle_saida_entrada_produtos.id_produto = produtos.id_produto');
		$this->db->join('veiculos','controle_saida_entrada_produtos.id_veiculo = veiculos.id_veiculo');
		$this->db->order_by("data_retirada_produto", "desc");
		$this->db->limit(10);
		return $this->db->get()->result();
	}
}
