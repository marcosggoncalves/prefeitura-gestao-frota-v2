<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculo extends CI_controller{
	public function index(){
		$data['categorias'] = $this->Dao_veiculo->categorias();
		$this->load->view('forms/cadastrar_veiculo',$data);
	}
	public function veiculo_salvar()
	{
		$this->form_validation->set_rules('placa_veiculo','Placa veiculo','required');
		$this->form_validation->set_rules('desc_veiculo','Descrição veiculo ','required');
		$this->form_validation->set_rules('categoria_veiculo','Categoria veiculo','required');

		if($this->form_validation->run() == false){
			$data['categorias'] = $this->Dao_veiculo->categorias();
			$this->load->view('forms/cadastrar_veiculo',$data);
		}else{

			$veiculo = Array(
				'placa_veiculo'=>$this->input->post('placa_veiculo'),
				'descricao_veiculo'=>$this->input->post('desc_veiculo'),
				'status_veiculo'=>'Disponivel',
				'id_categoria'=>$this->input->post('categoria_veiculo')
			);


			$save = $this->Dao_veiculo->salvar_veiculo($veiculo);

			if($save){
				$this->session->set_flashdata('messagem','Veiculo cadastrado com sucesso');
				redirect('/painel');
			}else{
				$this->session->set_flashdata('messagem','Não foi possivel cadastar veiculo');
				redirect('/cadastrar/veiculo/salvar');
			}
		}
	}
}