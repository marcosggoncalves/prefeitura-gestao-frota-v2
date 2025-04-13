<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Manuntencao extends CI_controller{
	public function index()
	{
		$data['veiculos_servico'] = $this->Dao_manuntencao->all_veiculos_status('Serviço');
		$data['veiculos_reserva'] = $this->Dao_manuntencao->all_veiculos_status('Reserva');
		$this->load->view('forms/cadastrar_saida_manuntencao',$data);
	}
	public function relatorio_saida_manuntencao(){
		$config = array();
        $config["base_url"] = base_url() . "relatorio-saida-manuntencao";
        $config["total_rows"] = $this->Dao_manuntencao->count_saida_manuntencao();
        $config["per_page"] = 15;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['saida_manuntencao'] = $this->Dao_manuntencao->todas_saida_manuntencao($config["per_page"], $page);
		$this->load->view('relatorios/relatorio_saida_manuntencao',$data);
	}
	public function salvar_saida_manuntencao(){
		$this->form_validation->set_rules('km_saida_veiculo','Quilometragem veiculo','required');
		$this->form_validation->set_rules('desc_manuntencao','Descrição manutenção ','required');
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
				'status' => 'aberto',
				'data_saida_veiculo' => date("Y-m-d H:i:s"),
				'veiculo_substituicao' =>  $this->input->post('placa_veiculo'), 
				'id_veiculo' => $this->input->post('id_veiculo'),
				'desc_manuntencao' => $this->input->post('desc_manuntencao')
			);
			$save = $this->Dao_manuntencao->salvar_saida_manuntencao($campos);

			if($save){
				registraLog($this->session->logado[0]->nome_usuario.'registrou saida para manutenção ','inserção de dados');

				if( $this->input->post('placa_veiculo') != 'Veiculo não substituido'){
					$this->Dao_manuntencao->mudar_status_por_placa($this->input->post('placa_veiculo'),'Indisponivel');
				}

				$this->Dao_manuntencao->mudar_status($this->input->post('id_veiculo'),'Indisponivel');

				$this->session->set_flashdata('messagem','Saida manutenção  registrada com sucesso.');
				redirect('/painel');
			}else{
				$this->session->set_flashdata('messagem','Não foi possivel registrar saida de manutenção ');
				redirect('/painel');
			}
		}
	}
	public function saida_manuntencao_visualizar($id)
	{
		$data['consulta'] = $this->Dao_manuntencao->saida_manuntencao($id);
		$this->load->view('relatorios/relatorio_geral_manuntencao',$data);
	}
	public function  saida_manuntencao_deletar($id)
	{
		registraLog($this->session->logado[0]->nome_usuario.' deletou registro saida para manutenção  do veiculo: '. $id,'exclusão de dados');
		$this->Dao_manuntencao->deletar_saida_manuntencao($id);
		$this->session->set_flashdata('messagem','Saida manutenção  deletada com sucesso.');
				redirect('/relatorio-saida-manuntencao');
	}
	public function alterar_status_saida_manuntencao($id,$status)
	{
		registraLog($this->session->logado[0]->nome_usuario.' alterou status do registro saida para manutenção  do veiculo: '. $id,'edição de dados');
		$this->Dao_manuntencao->alterar_status_saida_manuntencao($id,$status);
		$this->session->set_flashdata('messagem','Registro saida para manutenção  reaberto com sucesso.');
		redirect("saida-manuntencao-finalizar/{$id}");
	}
	public function finalizar_saida_manuntencao($id)
	{
		$data['consulta'] = $this->Dao_manuntencao->saida_manuntencao($id);
		$this->load->view('forms/finalizar_manuntencao',$data);
	}
	public function finalizar_saida_manuntencao_salvar($id)
	{
		$this->form_validation->set_rules('km_retorno_veiculo','Quilometragem chegada do veiculo','required');
		$this->form_validation->set_rules('data_retorno_veiculo','Data de chegada de veiculo na garagem','required');


		if($this->form_validation->run() == FALSE){
			$data['consulta'] = $this->Dao_manuntencao->saida_manuntencao($id);
			$this->load->view('forms/finalizar_manuntencao',$data);
		}else{
			registraLog($this->session->logado[0]->nome_usuario.' finalizou registro de saida para manutenção  do veiculo: '. $id,'fechamento de registro');
			$this->Dao_manuntencao->mudar_status_por_placa($this->input->post('placa_veiculo'),'Disponivel');
			
			if($this->input->post('substituto_placa_veiculo') != 'Veiculo não substituido'){
				$this->Dao_manuntencao->mudar_status_por_placa($this->input->post('substituto_placa_veiculo'),'Disponivel');
			}
			$campos = array(
				'status'=>'fechado',
				'km_retorno_veiculo'=>$this->input->post('km_retorno_veiculo'),
				'data_retorno_veiculo'=>$this->input->post('data_retorno_veiculo')
			);
			$this->Dao_manuntencao->finalizar_saida_manuntencao($campos,$id);
			redirect("saida-manuntencao-visualizar/{$id}");
		}
	}
}