<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('index');
	}
	public function entrar(){

		$this->form_validation->set_rules('usuario','Usuário','required');
		$this->form_validation->set_rules('senha','Senha ','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('index');
		}else{
			$user = $this->input->post('usuario');
			$senha = md5($this->input->post('senha'));

			$verify_user = $this->Dao_login->entrar($user,$senha);

			if($verify_user != null){
				if($verify_user[0]->status == 'Inativo'){
					registra_log($this->input->post('usuario').' Tentou acessar o sistema, porém está bloquado.','acesso sistema');
					$this->session->set_flashdata('messagem','Usuário bloqueado pelo administrador.');
					redirect('/');
				}else{
					registra_log($this->input->post('usuario').' efetuou login no sistema','acesso sistema');
					$this->Dao_login->data_acesso($verify_user[0]->id_usuario);
					$this->session->tempdata();
					$this->session->set_userdata('logado',$verify_user);
					redirect('/painel');
				}
			}else{
				$this->session->set_flashdata('messagem','Usuário ou senha inválidos.');
				redirect('/');
			}
		}
	}
	public function encerrar_session()
	{
		registra_log($this->session->logado[0]->nome_usuario.' encerrou sessão no sistema','acesso sistema');
		$this->session->sess_destroy();
		redirect('/');
	}
}
