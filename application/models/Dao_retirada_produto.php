	<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dao_retirada_produto extends CI_Model{
	public function __construct(){
		parent::__construct();
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