<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_controller{
	public function index(){
		$config = array();
        $config["base_url"] = base_url() . "cadastrar-categoria";
        $config["total_rows"] = $this->Dao_categoria->count_categoria();
        $config["per_page"] = 5;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['categoria'] = $this->Dao_categoria->categorias($config["per_page"], $page);
		$this->load->view('forms/cadastrar_categoria',$data);
	}
	public function categoria_salvar()
	{
		$this->form_validation->set_rules('nome_categoria','nome categoria','required');
		$this->form_validation->set_rules('status_categoria','status categoria','required');
	
		if($this->form_validation->run() == false){
			$config = array();
	        $config["base_url"] = base_url() . "cadastrar-categoria";
	        $config["total_rows"] = $this->Dao_categoria->count_categoria();
	        $config["per_page"] = 5;
	        $config["uri_segment"] = 2;
	        $this->pagination->initialize($config);
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	        $data["links"] = $this->pagination->create_links();
	        $data['categoria'] = $this->Dao_categoria->categorias($config["per_page"], $page);
			$this->load->view('forms/cadastrar_categoria',$data);
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
	public function editar_categoria($id)
	{
		$data['consulta'] = $this->Dao_categoria->categoria($id);
		$this->load->view('forms/editar_categoria',$data);
	}
	public function deletar_categoriao($id)
	{
		registra_log($this->session->logado[0]->nome_usuario.' deletou categoria de veiculo: '. $id,'exclusão de dados');
		$this->Dao_categoria->deletar_categoria($id);
		$this->session->set_flashdata('messagem','Categoria deletada com sucesso.');
				redirect('/cadastrar-categoria');
	}
	public function editar_categoria_salvar($id)
	{
		
		$this->form_validation->set_rules('nome_categoria','nome categoria','required');
		$this->form_validation->set_rules('status_categoria','status categoria','required');
	
		if($this->form_validation->run() == false){
			$data['consulta'] = $this->Dao_categoria->categoria($id);
			$this->load->view('forms/editar_categoria',$data);
		}else{
			registra_log($this->session->logado[0]->nome_usuario.' editou categoria de veiculo: '. $id,'edição de dados');
			$data['consulta'] = $this->Dao_categoria->editar_categoria($id,$this->input->post());
			$this->session->set_flashdata('messagem','Categoria alterada com sucesso.');
			redirect('/cadastrar-categoria');
		}
	}
}