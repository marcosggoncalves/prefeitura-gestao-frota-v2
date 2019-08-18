<!DOCTYPE html>
<html>
	<?php include('public/componentes/head_page.inc');?>
<body>
	<?php include('public/componentes/header.inc');?>
	<main>
		<?php include('public/componentes/sidebar.inc');?>
			<?php include 'public/componentes/msg.inc'?>
		<div class="content">
			<div class="box-dados">
				<div class="box-dados-title">
					<h1>Log(s) - execuções no sistema</h1>
				</div>
				<div class="logs">
					<?=logs();?>
				</div>
			</div>
		</div>		
	</main>
	<?php include('public/componentes/footer.inc');?>
	 <script src="<?=base_url('/public/js/contador.js') ?>"></script>
</body>
</html>