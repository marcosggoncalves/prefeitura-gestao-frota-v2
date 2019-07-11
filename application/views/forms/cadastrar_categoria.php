<!-- controller -->
    <?php include '../../php/autoload.php'; ?>
<!-- ---------- -->

<!DOCTYPE html>
<html>
	<?php include '../componentes/head_page.inc'?>
<body>
	<?php include '../componentes/header.inc'?>
	<main>
		<?php include '../componentes/sidebar.inc'?>
		<div class="content">
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Cadastrar categoria</h1>
				</div>
				<div class="form_registrar">
					<form name="form" action="../../php/request.php?page=Salvar/categoria" method="post">
						<div class="container-input">
							<label>Nome:</label>
							<input type="text" name="nome_categoria">
						</div>
						<div class="container-input">
							<label>Status</label>
							<select name="status_categoria">
								<option  value="" >Selecionar status</option>
								<option>Reserva</option>
								<option>Serviço</option>
							</select>
						</div>
						<div class="conjuntos_btns">
							<div>
								<input type="button"  name="button" onclick="inputs_name_validar('nome_categoria','status_categoria')" value="Cadastrar categoria">
							</div>
						</div>
						<div>
							<?php include '../componentes/msg.inc' ?>
						</div>
					</form>
				</div>
			</div>
		</div>		
	</main>
	<?php include '../componentes/footer.inc'?>
</body>
</html>