<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dao_produto_movimento extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function count_retirada_produtos(){
		return $this->db->count_all_results('produtos_movimentos');
	}
	public function todos_produtos_retirados($inicio,$maximo){
		$this->db->select('*');
		$this->db->from('produtos_movimentos');
		$this->db->join('produtos','produtos_movimentos.id_produto = produtos.id_produto');
		$this->db->join('usuario','produtos_movimentos.id_usuario = usuario.id_usuario');
		$this->db->join('veiculos','produtos_movimentos.id_veiculo = veiculos.id_veiculo', 'left');
		$this->db->order_by('data_movimento','desc');
		$this->db->limit($inicio,$maximo); 
		return $this->db->get()->result();
	}
	public function salvar_retirada_produto($campos)
	{
		$this->db->set($campos);
		return $this->db->insert('produtos_movimentos');
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
    	$this->db->set('quantidade_produto',$quantidade_restante);
    	$this->db->where('id_produto', $id);
    	return $this->db->update('produtos');
    }
}