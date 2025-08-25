<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller{
	public function index()
	{
		$data = array(
			'produtos_retirado'=>$this->Dao_painel->contador_geral_por_tabela('produtos_movimentos'),
			'troca_oleo'=>$this->Dao_painel->contador_geral_por_tabela('controle_troca_oleo'),
			'saida_manuntencao'=>$this->Dao_painel->contador_geral_por_tabela('saida_para_manuntencao'),
			'veiculos_Indisponivel'=>$this->Dao_painel->contador_por_condicao('veiculos','status','Indisponivel'),
			'veiculos_disponivel'=>$this->Dao_painel->contador_por_condicao('veiculos','status','Disponivel'),
			'manuntencoes_recentes'=>$this->Dao_painel->manutencoes_recentes(),
			'produtos_movimentacoes'=>$this->Dao_painel->produtos_movimentacoes()
		);
		$this->load->view('relatorios/painel',$data);
	}
}	
