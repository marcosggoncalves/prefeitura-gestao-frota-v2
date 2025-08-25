<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Retirada_produto extends CI_controller{
	public function index(){
		$data['produtos'] = $this->Dao_produto_movimento->produtos();
		$data['veiculos'] = $this->Dao_produto_movimento->veiculos();
		$this->load->view('forms/cadastrar_retirada_produto',$data);
	}
	public function entrada(){
		$data['produtos'] = $this->Dao_produto_movimento->produtos();
		$this->load->view('forms/cadastrar_entrada_produto',$data);
	}
	public function produtos_movimentacoes(){
		$config = array();
        $config["base_url"] = base_url() . "relatorio-produtos-movimetacoes";
        $config["total_rows"] = $this->Dao_produto_movimento->count_retirada_produtos();
        $config["per_page"] = 15;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['produtos'] = $this->Dao_produto_movimento->todos_produtos_retirados($config["per_page"], $page);
		$this->load->view('relatorios/relatorio_movimetacoes_produto',$data);
	}
	public function retirada_produto_salvar()
	{
		$this->form_validation->set_rules('quantidade_movimento','Quantidade de produto retirado ','required');
		$this->form_validation->set_rules('id_produto','Identificação do produto','required');
		$this->form_validation->set_rules('id_veiculo','Identificação do veiculo','required');
		
		if($this->form_validation->run() == false){
			return $this->index();
		}

		$usuario = $this->session->logado[0];
		$quantidadeProduto = $this->input->post('quantidade_movimento');
		$produto = $this->Dao_produto_movimento->produto($this->input->post('id_produto'));

		if($produto[0]->quantidade_produto == 0){
			$this->session->set_flashdata('messagem','Produto esgotado.');
			redirect('/registrar/retirada/produto');
		}else if($quantidadeProduto > $produto[0]->quantidade_produto){
			$this->session->set_flashdata('messagem','Quantidade indisponivel para retirada.');
			redirect('/registrar/retirada/produto');
		}else{
			$restante_produto = $produto[0]->quantidade_produto -  $quantidadeProduto;

			registraLog($usuario->nome_usuario.' fez a retirada do produto: '. $produto[0]->nome_produto.'/quantidade retirada'. $quantidadeProduto ,'registro de dados');
			
			$atualizar_quantidade_restante = $this->Dao_produto_movimento->atualizar_quantidade_restante($this->input->post('id_produto'), $restante_produto);
			
			if(	$atualizar_quantidade_restante){
				$produto = array(
					'quantidade_movimento'=> $quantidadeProduto,
					'tipo_movimentacao' => 0,
					'id_usuario' => $usuario->id_usuario,
					'id_produto'=>$this->input->post('id_produto'),
					'id_veiculo'=>$this->input->post('id_veiculo')
				);

				$this->Dao_produto_movimento->salvar_retirada_produto($produto);

				$this->session->set_flashdata('messagem','Retirada de produto registrada com sucesso.');
			}

			redirect('/painel');
		}
	}
	public function entrada_produto_salvar()
	{
		$this->form_validation->set_rules('quantidade_movimento','Quantidade de produto ','required');
		$this->form_validation->set_rules('id_produto','Identificação do produto','required');
		
		if($this->form_validation->run() == false){
			return $this->entrada();
		}
		
		$usuario = $this->session->logado[0];
		$quantidadeProduto = $this->input->post('quantidade_movimento');
		$produto = $this->Dao_produto_movimento->produto($this->input->post('id_produto'));

		if($produto[0]->quantidade_produto <= 0){
			$this->session->set_flashdata('messagem','Quantidade inválida!');
			return redirect('/registrar/entrada/produto');
		}

		$nova_quantidade_produto = $produto[0]->quantidade_produto +  $quantidadeProduto;

		registraLog($usuario->nome_usuario.' fez uma entrada de produto: '. $produto[0]->nome_produto.'/quantidade entrada'. $quantidadeProduto ,'registro de dados');
		
		$atualizar_quantidade_restante = $this->Dao_produto_movimento->atualizar_quantidade_restante($this->input->post('id_produto'), $nova_quantidade_produto);
		
		if(	$atualizar_quantidade_restante){
			$produto = array(
				'quantidade_movimento'=> $quantidadeProduto,
				'tipo_movimentacao' => 1,
				'id_usuario' => $usuario->id_usuario,
				'id_produto'=>$this->input->post('id_produto')
			);

			$this->Dao_produto_movimento->salvar_retirada_produto($produto);

			$this->session->set_flashdata('messagem','Entrada de produto registrada com sucesso.');
		}

		redirect('/painel');
	}
}