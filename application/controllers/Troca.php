<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Troca extends CI_controller{
	public function index(){
		$data['veiculos'] = $this->Dao_troca->veiculos();
		$this->load->view('forms/cadastrar_troca_oleo',$data);
	}
	public function troca_oleo_salvar()
	{
		$this->form_validation->set_rules('km_troca','Quilometragem ','required');
		$this->form_validation->set_rules('data_troca','Data da troca do oléo  ','required');
		$this->form_validation->set_rules('id_veiculo','Selecione o veiculo','required');
			

		if($this->form_validation->run() == False){
			$data['veiculos'] = $this->Dao_troca->veiculos();
			$this->load->view('forms/cadastrar_troca_oleo',$data);
		}else{

			$save = $this->Dao_troca->salvar_troca_oleo($this->input->post());

			if($save){
				$this->session->set_flashdata('messagem','Troca de óleo registrada com sucesso.');
				redirect('/painel');
			}else{
				$this->session->set_flashdata('messagem','Não foi possivel registrar troca de óleo.');
				redirect('/registrar/troca/oleo');
			}
		}
	}
}