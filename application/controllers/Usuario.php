<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_controller{
	public function todos_usuario()
	{
		$data['usuarios'] = $this->Dao_usuario->usuarios();
		$this->load->view('relatorios/relatorio_todos_usuarios',$data);
	}
	public function editar($id)
	{
		$data['usuario'] = $this->Dao_usuario->usuario($id);
		$this->load->view('forms/editar_usuario',$data);
	}
	public function editar_salvar($id)
	{	
		$this->form_validation->set_rules('senha_usuario','senha ','required');

		if($this->form_validation->run() == false){
			$data['usuario'] = $this->Dao_usuario->usuario($id);
			$this->load->view('forms/editar_usuario',$data);
		}else{
			$usuario = array('nome_usuario' =>$this->input->post('nome_usuario') ,
						'setor_usuario' => $this->input->post('setor_usuario'),
						'email_usuario' => $this->input->post('email_usuario'), 
						'telefone_usuario' => $this->input->post('telefone_usuario'),
						'senha_usuario' =>md5($this->input->post('senha_usuario')),
						'status' =>'Ativo',
						'acesso' =>date("Y-m-d H:i:s")
					);

			$this->Dao_usuario->editar_usuario($id,$usuario);
			$this->session->set_flashdata('messagem','Informações do usuário salvo com sucesso.');
			redirect('/painel');
		}
	}
	public function cadastrar()
	{
		$this->load->view('forms/cadastrar_usuario');
	}
	public function cadastrar_salvar()
	{
		$this->form_validation->set_rules('nome_user',' nome ','required');
		$this->form_validation->set_rules('setor_user','selecione setor ','required');
		$this->form_validation->set_rules('telefone_user','telefone ','required');
		$this->form_validation->set_rules('email_user','e-mail','required');
		$this->form_validation->set_rules('senha_user','senha ','required');

		if($this->form_validation->run() == false){
			$this->load->view('forms/cadastrar_usuario');
		}else{

			$usuario = array('nome_usuario' =>$this->input->post('nome_user') ,
						'setor_usuario' => $this->input->post('setor_user'),
						'email_usuario' => $this->input->post('email_user'), 
						'telefone_usuario' => $this->input->post('telefone_user'),
						'senha_usuario' =>md5($this->input->post('senha_user')),
						'status' =>'Ativo',
						'acesso' =>null
					);

			$save = $this->Dao_usuario->salvar_usuario($usuario);

			if($save){
				$this->session->set_flashdata('messagem','Usuário salvo com sucesso.');
				redirect('/painel');
			}else{
				$this->session->set_flashdata('messagem','Não foi possivel salvar usuário');
				redirect('/usuario/cadastrar');
			}
		}
	}
	public function bloquear_usuario($id)
	{
		$this->Dao_usuario->status_usuario($id,'Inativo');
		$this->session->set_flashdata('messagem','Usuário bloqueado, código:'.$id.'');
		redirect('/usuario/todos');
	}
	public function desbloquear_usuario($id)
	{	
		$this->Dao_usuario->status_usuario($id,'Ativo');
		$this->session->set_flashdata('messagem','Usuário desbloqueado, código:'.$id.'');
		redirect('/usuario/todos');
	}
	public function deletar_usuario($id)
	{
		$this->Dao_usuario->deletar_usuario($id);
		$this->session->set_flashdata('messagem','Usuário deletado com sucesso');
		redirect('/usuario/todos');
	}
}