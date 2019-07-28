<!DOCTYPE html>
<html>
	<link rel="manifest" href="<?=base_url('public/manifest.json');?>">
	<?php include 'public/componentes/head.inc'?>
	<body>
		<main>
			<div class="login">
				<form name="form" action="<?=base_url('/entrar');?>" method="post">
					<div class="titulo">
						<div>	
							<h1>Transporte escolar</h1>
							<h2>Sistema de controle</h2>	
						</div>
					</div>
					<div class="container-login">
						<label for="Usuário">Usuário</label>
						<input type="text" name="usuario" id="usuario">
					</div>

					<div class="container-login">
						<label for="senha">Senha</label>
						<input type="password" name="senha" id="senha">
					</div>
					<div class="container-login">	
						<input type="submit" value="Entrar">
					</div>
					<div>
						<?php include 'public/componentes/msg.inc'?>
					</div>
				</form>
			</div>
		</main>	
	</body>
</html>
