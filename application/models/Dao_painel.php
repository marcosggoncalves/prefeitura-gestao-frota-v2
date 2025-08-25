<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Dao_painel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function contador_geral_por_tabela($tabela)
	{
		return $this->db->count_all($tabela);
	}
	public function contador_por_condicao($tabela,$condition,$where)
	{
		$this->db->where($condition, $where);
		return $this->db->count_all_results($tabela);
	}
	public function manutencoes_recentes()
	{
		$this->db->select('*');
		$this->db->from('saida_para_manuntencao');
		$this->db->join('veiculos','saida_para_manuntencao.id_veiculo = veiculos.id_veiculo');
		$this->db->where('saida_para_manuntencao.status','Aberto');
		$this->db->order_by("data_saida_veiculo", "desc");
		$this->db->limit(10);
		return $this->db->get()->result();
	}
	public function produtos_movimentacoes()
	{
		$this->db->select('*');
		$this->db->from('produtos_movimentos');
		$this->db->join('produtos','produtos_movimentos.id_produto = produtos.id_produto');
		$this->db->join('veiculos','produtos_movimentos.id_veiculo = veiculos.id_veiculo', 'left');
		$this->db->order_by("data_movimento", "desc");
		$this->db->limit(10);
		return $this->db->get()->result();
	}
}
