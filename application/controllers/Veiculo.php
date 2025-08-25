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
		$this->form_validation->set_rules('lugares','Capacidade de pessoas(lugares)','required');

		if($this->form_validation->run() == false){
			return $this->index();
		}

		$veiculo = Array(
			'placa_veiculo'=>$this->input->post('placa_veiculo'),
			'descricao_veiculo'=>$this->input->post('desc_veiculo'),
			'status'=>'Disponivel',
			'lugares' => $this->input->post('lugares'),
			'id_categoria'=>$this->input->post('categoria_veiculo')
		);

		$salvar = $this->Dao_veiculo->salvar_veiculo($veiculo);

		if($salvar){
			registraLog($this->session->logado[0]->nome_usuario.' cadastrou novo veiculo: '.$this->input->post('placa_veiculo'),'inserção de dados');
			$this->session->set_flashdata('messagem','Veiculo cadastrado com sucesso');
			return	redirect('/painel');
		}

		$this->session->set_flashdata('messagem','Não foi possivel cadastar veiculo');
		
		redirect('/cadastrar/veiculo/salvar');
	}
	public function relatorio_veiculos()
	{
		$config = array();
        $config["base_url"] = base_url() . "relatorio-veiculos";
        $config["total_rows"] = $this->Dao_veiculo->count_veiculos();
        $config["per_page"] = 15;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['veiculos'] = $this->Dao_veiculo->veiculos($config["per_page"], $page);
		$this->load->view('relatorios/relatorio_todos_veiculos',$data);
	}
	public function deletar_veiculo($id)
	{
		registraLog($this->session->logado[0]->nome_usuario.' deletou o veiculo: '.$id,'exclusão de dados');
		$this->Dao_veiculo->deletar_veiculo($id);
		$this->session->set_flashdata('messagem','Veiculo deletado com sucesso.');
		redirect('relatorio-veiculos');
	}
	public function editar_veiculo($id)
	{
		$data['categorias'] = $this->Dao_veiculo->categorias();
		$data['consulta'] = $this->Dao_veiculo->veiculo($id);
		$this->load->view('forms/editar_veiculo',$data);
	}
	public function editar_veiculo_salvar($id)
	{
		$this->form_validation->set_rules('placa_veiculo','Placa veiculo','required');
		$this->form_validation->set_rules('descricao_veiculo','Descrição veiculo ','required');
		$this->form_validation->set_rules('id_categoria','Categoria veiculo','required');

		if($this->form_validation->run() == false){
			return $this->editar_veiculo($id);
		}
		
		registraLog($this->session->logado[0]->nome_usuario.' editou o veiculo: '.$id,'edição de dados');
		$this->Dao_veiculo->editar_veiculos($this->input->post(),$id);
		$this->session->set_flashdata('messagem',' Dados do veiculo alterado com sucesso.');
		redirect('relatorio-veiculos');
	}
}