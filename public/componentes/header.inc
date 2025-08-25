<header>
	<div class="sub-header">
		<div class="logo">
			<div>
				<img src="<?=base_url('/public/img/logo.jpg')?>">
			</div>
			<div>
				<h1><?=$this->session->parametros->titulo_sistema ?></h1>
				<h2><?=$this->session->parametros->subtitulo_sistema ?></h2>
			</div>
		</div>
		<div class="user">
			<p><span><?=$this->session->logado[0]->nome_usuario?> / <?=$this->session->logado[0]->setor_usuario?> </span> <a onclick="janela_mensagem('encerrar','sessão','<?=base_url('/sair')?>')"><i class="material-icons">exit_to_app</i></a></p>
		</div>
	</div>
</header>
<?php 
	if(empty($this->session->userdata('logado'))):
		$this->session->set_flashdata('messagem','Sessão finalizada, acesso painel novamente.');
		redirect('/');
	endif;
?>
<?php include'public/componentes/card-alert.inc' ?>