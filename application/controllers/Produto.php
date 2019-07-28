<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_controller{
	public function index(){
		$this->load->view('forms/cadastrar_produto');
	}
	public function produto_salvar()
	{
		$this->form_validation->set_rules('nome_produto','nome produto','required');
		$this->form_validation->set_rules('quantidade_produto','quantidade produto','required');
	
		if($this->form_validation->run() == false){
			$this->load->view('forms/cadastrar_produto');
		}else{

			$produto  = array('nome_produto' => $this->input->post('nome_produto'), 
							'data_produto_recebido'=>date("Y-m-d H:i:s"),
							'quantidade_produto'=> $this->input->post('quantidade_produto'),
							'quantidade_restante'=>$this->input->post('quantidade_produto')
						);


			$save = $this->Dao_produto->salvar_produto($produto);

			if($save){
				$this->session->set_flashdata('messagem','Produto cadastrada com sucesso.');
				redirect('/painel');
			}else{
				$this->session->set_flashdata('messagem','Não foi possivel cadastradar um novo produto.');
				redirect('/cadastrar/categoria');
			}
		}
	}
}