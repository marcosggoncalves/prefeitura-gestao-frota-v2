<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_controller{
	public function index(){
		$this->load->view('forms/cadastrar_categoria');
	}
	public function categoria_salvar()
	{
		$this->form_validation->set_rules('nome_categoria','nome categoria','required');
		$this->form_validation->set_rules('status_categoria','status categoria','required');
	
		if($this->form_validation->run() == false){
			$this->load->view('forms/cadastrar_categoria');
		}else{
			registra_log($this->session->logado[0]->nome_usuario.' cadastrou a categoria: '.$this->input->post('nome_categoria').'/'.$this->input->post('status_categoria'),'inserção de dados');

			$save = $this->Dao_categoria->salvar_categoria($this->input->post());

			if($save){
				$this->session->set_flashdata('messagem','Categoria cadastrada com sucesso.');
				redirect('/painel');
			}else{
				$this->session->set_flashdata('messagem','Não foi possivel cadastradar um nova categoria.');
				redirect('/cadastrar/categoria');
			}
		}
	}
}