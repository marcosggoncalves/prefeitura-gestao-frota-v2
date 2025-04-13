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
			$produto  = array(
				'nome_produto' => $this->input->post('nome_produto'), 
				'data_produto_recebido'=>date("Y-m-d H:i:s"),
				'quantidade_produto'=> $this->input->post('quantidade_produto'),
				'quantidade_restante'=>$this->input->post('quantidade_produto')
			);

			$save = $this->Dao_produto->salvar_produto($produto);

			if($save){
				registraLog($this->session->logado[0]->nome_usuario.' cadastrou novo produto: '. $this->input->post('nome_produto'),'inserção de dados');
				$this->session->set_flashdata('messagem','Produto cadastrada com sucesso.');
				redirect('/painel');
			}else{
				$this->session->set_flashdata('messagem','Não foi possivel cadastradar um novo produto.');
				redirect('/cadastrar/categoria');
			}
		}
	}
	public function relatorio_produtos()
	{
		$config = array();
        $config["base_url"] = base_url() . "relatorio-produtos";
        $config["total_rows"] = $this->Dao_produto->count_produtos();
        $config["per_page"] = 15;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['produtos'] = $this->Dao_produto->produtos($config["per_page"], $page);
		$this->load->view('relatorios/relatorio_todos_produtos',$data);
	}
	public function editar_produto_salvar($id)
	{
		$this->form_validation->set_rules('nome_produto','nome produto','required');
		$this->form_validation->set_rules('quantidade_produto','quantidade produto','required');
	
		if($this->form_validation->run() == false){
			$this->load->view('forms/cadastrar_produto');
		}else{
			registraLog($this->session->logado[0]->nome_usuario.' editou o produto: '. $this->input->post('nome_produto'),'edição de dados');

			$produto  = array(
				'nome_produto' => $this->input->post('nome_produto'), 
				'quantidade_produto'=> $this->input->post('quantidade_produto'),
				'quantidade_restante'=>$this->input->post('quantidade_produto')
			);

			$this->Dao_produto->editar_produto($id,$produto);
			$this->session->set_flashdata('messagem','Produto alterado com sucesso.');
				redirect('relatorio-produtos');
		}

	}
	public function deletar_produto($id)
	{
		registraLog($this->session->logado[0]->nome_usuario.' deletou o produto: '.$id,'exclusão de dados');
		$this->Dao_produto->deletar_produto($id);
		$this->session->set_flashdata('messagem','Produto deletado com sucesso');
		redirect('relatorio-produtos');
	}
	public function editar_produto($id)
	{
		$data['consulta'] = $this->Dao_produto->produto($id);
		$this->load->view('forms/editar_produto',$data);
	}
}