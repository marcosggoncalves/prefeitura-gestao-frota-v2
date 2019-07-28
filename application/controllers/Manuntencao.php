<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Manuntencao extends CI_controller{
	public function index()
	{
		$data['veiculos_servico'] = $this->Dao_manuntencao->all_veiculos_status('Serviço');
		$data['veiculos_reserva'] = $this->Dao_manuntencao->all_veiculos_status('Reserva');
		$this->load->view('forms/cadastrar_saida_manuntencao',$data);
	}
	public function salvar_saida_manuntencao(){
		$this->form_validation->set_rules('km_saida_veiculo','Quilometragem veiculo','required');
		$this->form_validation->set_rules('desc_manuntencao','Descrição Manuntenção','required');
		$this->form_validation->set_rules('id_veiculo','Selecione veiculo','required');
		$this->form_validation->set_rules('placa_veiculo','Selecione veiculo substituto','required');

		if($this->form_validation->run() == FALSE){
			$data['veiculos_servico'] = $this->Dao_manuntencao->all_veiculos_status('Serviço');
			$data['veiculos_reserva'] = $this->Dao_manuntencao->all_veiculos_status('Reserva');
			$this->load->view('forms/cadastrar_saida_manuntencao',$data);
		}else{
			$campos = array(
				'km_retorno_veiculo' => null,
				'km_saida_veiculo' => $this->input->post('km_saida_veiculo'),
				'data_retorno_veiculo' => null,
				'status' => 'Aberto',
				'data_saida_veiculo' => date("Y-m-d H:i:s"),
				'veiculo_substituicao' =>  $this->input->post('placa_veiculo'), 
				'id_veiculo' => $this->input->post('id_veiculo'),
				'desc_manuntencao' => $this->input->post('desc_manuntencao')
			);
			$save = $this->Dao_manuntencao->salvar_saida_manuntencao($campos);

			if($save){
				$this->session->set_flashdata('messagem','Saida manuntenção registrada com sucesso.');
				redirect('/painel');
			}else{
				$this->session->set_flashdata('messagem','Não foi possivel registrar saida de manuntenção');
				redirect('/painel');
			}
		}
	}
}