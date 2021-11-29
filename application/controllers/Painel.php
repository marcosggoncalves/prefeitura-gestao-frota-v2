<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller{
	public function index()
	{
		$data = array(
			'produtos_retirado'=>$this->Dao_painel->count_register('controle_saida_entrada_produtos'),
			'troca_oleo'=>$this->Dao_painel->count_register('controle_troca_oleo'),
			'saida_manuntencao'=>$this->Dao_painel->count_register('controle_saida_entrada_produtos'),
			'veiculos_Indisponivel'=>$this->Dao_painel->count_register_where('veiculos','status','Indisponivel'),
			'veiculos_disponivel'=>$this->Dao_painel->count_register_where('veiculos','status','Disponivel'),
			'manuntencoes_recentes'=>$this->Dao_painel->recent_maintenances(),
			'produtos_retirado_lista'=>$this->Dao_painel->products_retirado()
		);
		$this->load->view('relatorios/painel',$data);
	}
}	
