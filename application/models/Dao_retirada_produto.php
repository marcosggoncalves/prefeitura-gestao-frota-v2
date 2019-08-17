<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dao_retirada_produto extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function count_retirada_produtos(){
		return $this->db->count_all_results('controle_saida_entrada_produtos');
	}
	public function todos_produtos_retirados($inicio,$maximo){
		$this->db->select('*');
		$this->db->from('controle_saida_entrada_produtos');
		$this->db->join('produtos','controle_saida_entrada_produtos.id_produto = produtos.id_produto');
		$this->db->join('veiculos','controle_saida_entrada_produtos.id_veiculo = veiculos.id_veiculo');
		$this->db->order_by('controle_saida_entrada_produtos.id_controle_produtos','desc');
		$this->db->limit($inicio,$maximo); 
		return $this->db->get()->result();
	}
	public function salvar_retirada_produto($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('controle_saida_entrada_produtos');
	}
	public function veiculos()
	{
		return $this->db->get('veiculos')->result();
	}
	public function produtos()
	{
		$this->db->order_by('id_produto','desc');
		return $this->db->get('produtos')->result();
	}
	public function produto($id)
	{
		$this->db->where('id_produto',$id);
		return $this->db->get('produtos')->result();
	}
	public function atualizar_quantidade_restante($id,$quantidade_restante)
    {
    	$this->db->set('quantidade_restante',$quantidade_restante);
    	$this->db->where('id_produto', $id);
    	return $this->db->update('produtos');
    }
}