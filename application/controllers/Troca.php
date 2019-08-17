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
	public function relatorio_troca_oleo()
	{
		$config = array();
        $config["base_url"] = base_url() . "relatorio-troca-oleo";
        $config["total_rows"] = $this->Dao_troca->count_troca_oleo();
        $config["per_page"] = 15;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['consulta'] = $this->Dao_troca->trocas_oleos($config["per_page"], $page);
		$this->load->view('relatorios/relatorio_todas_troca_oleo',$data);
	}
	public function deletar_troca($id)
	{
		$this->Dao_troca->deletar_troca($id);
		$this->session->set_flashdata('messagem','Registro de troca de oleo deletado com sucesso.');
		redirect('relatorio-troca-oleo');
	}
	public function editar_troca_oleo($id)
	{
		$data['consulta'] = $this->Dao_troca->troca_oleo($id);
		$this->load->view('forms/editar_troca_oleo',$data);
	}
	public function editar_troca_oleo_salvar($id)
	{
		$this->form_validation->set_rules('km_troca','Quilometragem de troca de oleo do veiculo','required');

		if($this->form_validation->run() == FALSE){
			$data['consulta'] = $this->Dao_troca->troca_oleo($id);
			$this->load->view('forms/editar_troca_oleo',$data);
		}else{
			$this->Dao_troca->troca_oleo_salvar($id,$this->input->post('km_troca'));
			$this->session->set_flashdata('messagem','Registro de troca de oleo alterado com sucesso.');
			redirect('relatorio-troca-oleo');
		}
	}
}