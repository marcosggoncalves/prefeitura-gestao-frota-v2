<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Retirada_produto extends CI_controller{
	public function index(){
		$data['produtos'] = $this->Dao_retirada_produto->produtos();
		$data['veiculos'] = $this->Dao_retirada_produto->veiculos();
		$this->load->view('forms/cadastrar_retirada_produto',$data);
	}
	public function produtos_retirados(){
		$config = array();
        $config["base_url"] = base_url() . "relatorio-produtos-retirados";
        $config["total_rows"] = $this->Dao_retirada_produto->count_retirada_produtos();
        $config["per_page"] = 15;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['produtos'] = $this->Dao_retirada_produto->todos_produtos_retirados($config["per_page"], $page);
		$this->load->view('relatorios/relatorio_retirada_produto',$data);
	}
	public function retirada_produto_salvar()
	{
		$this->form_validation->set_rules('quantidade_retirada','Quantidade de produto retirado ','required');
		$this->form_validation->set_rules('id_produto','Indentificação do produto','required');
		$this->form_validation->set_rules('id_veiculo','Indentificação do veiculo','required');
		
		if($this->form_validation->run() == false){
			$data['produtos'] = $this->Dao_retirada_produto->produtos();
			$data['veiculos'] = $this->Dao_retirada_produto->veiculos();
			$this->load->view('forms/cadastrar_retirada_produto',$data);
		}else{

			$produto = $this->Dao_retirada_produto->produto($this->input->post('id_produto'));

			if($produto[0]->quantidade_restante == 0){
				$this->session->set_flashdata('messagem','Produto esgotado.');
				redirect('/registrar/retirada/produto');
			}else if($this->input->post('quantidade_retirada') > $produto[0]->quantidade_produto){
				$this->session->set_flashdata('messagem','Quantidade indisponivel para retirada.');
				redirect('/registrar/retirada/produto');
			}else{
				$restante_produto = 0;

				if($produto[0]->quantidade_restante == $produto[0]->quantidade_produto){
					$restante_produto = $produto[0]->quantidade_produto - $this->input->post('quantidade_retirada');
				}else{
					$restante_produto = $produto[0]->quantidade_restante - $this->input->post('quantidade_retirada');
				}

				$atualizar_quantidade_restante = $this->Dao_retirada_produto->atualizar_quantidade_restante($this->input->post('id_produto'),$restante_produto);
				
				$produto = array(
					'quantidade_retirada'=>$this->input->post('quantidade_retirada'),
					'data_retirada_produto'=>date("Y-m-d H:i:s"),
					'id_produto'=>$this->input->post('id_produto'),
					'id_veiculo'=>$this->input->post('id_veiculo'));

				$this->Dao_retirada_produto->salvar_retirada_produto($produto);


				$this->session->set_flashdata('messagem','Retirada de produto registrado com sucesso.');
				redirect('/painel');
			}
			
		}
	}
}