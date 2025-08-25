<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametros extends CI_Controller{
	public function index()
	{
		$data = [
			'parametros' => $this->session->parametros
		];
		
		$this->load->view('forms/editar_parametros',$data);
	}

	public function editar_salvar($id)
	{
		$this->form_validation->set_rules('km_troca_oleo','nome produto','required');
		$this->form_validation->set_rules('subtitulo_sistema','titulo do sistema','required');
		$this->form_validation->set_rules('titulo_sistema','subtitulo do sistema','required');
	
		if($this->form_validation->run() == false){
			return $this->index();
		}
		
		registraLog($this->session->logado[0]->nome_usuario.' editou parâmetros do sistema', 'edição de dados');

		$this->Dao_parametros->editar_salvar($id,$this->input->post());

		$this->session->sess_destroy();

		redirect('/');
	}
}	
