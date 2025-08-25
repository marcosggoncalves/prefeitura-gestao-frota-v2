<div class="navbar">
<div class="iconlogo">
	<a ><i id="btnnavbar" class="material-icons">dehaze</i>Menu</a>
</div>
	<nav id="navbar">
		<ul>
			<a href="<?=base_url('painel')?>"><li>Dashboard</li></a>
			<li>
				<a>Registrar</a>
				<ul>
					<a href="<?=base_url('registrar/saida/manuntencao')?>"><li>Saida manutenção </li></a>
					<a href="<?=base_url('registrar/troca/oleo')?>"><li>Troca de oléo</li></a>
					<a href="<?=base_url('registrar/retirada/produto')?>"><li>Retirada produto</li></a>
					<a href="<?=base_url('registrar/entrada/produto')?>"><li>Entrada produto</li></a>
				</ul>
			</li>
			<li>
				<a>Cadastro</a>
				<ul>
					<a href="<?=base_url('cadastrar/veiculo') ?>"><li>Veiculos</li></a>
					<a href="<?=base_url('cadastrar-categoria')?>"><li>Categorias</li></a>
					<a href="<?=base_url('cadastrar/produto')?>"><li>Produtos</li></a>
					<a href="<?=base_url('usuario/cadastrar')?>"><li>Usuários</li></a>
				</ul>
			</li>
			<li>
				<a>Relatórios</a>
				<ul>
					<a href="<?=base_url('relatorio-produtos-movimetacoes')?>"><li>Produtos movimentações</li></a>
					<a href="<?=base_url('relatorio-saida-manuntencao')?>"><li>Saida manutenção </li></a>
					<a href="<?=base_url('relatorio-troca-oleo')?>"><li>Troca óleo</li></a>
					<a href="<?=base_url('relatorio-veiculos')?>"><li>Veiculos</li></a>
					<a href="<?=base_url('relatorio-produtos')?>"><li>Produtos</li></a>
					<a href="<?=base_url('usuario/todos')?>"><li>Usuários</li></a>
				</ul>
			</li>
			<li>
				<a>Configurações</a>
				<ul>
					<a href="<?=base_url('usuario/editar/'.$this->session->logado[0]->id_usuario.'')?>"><li>Meu Perfil</li></a>
					<a href="<?=base_url('parametros')?>"><li>Parâmetros</li></a>
					<a href="<?=base_url('config/logs')?>"><li>Logs</li></a>
				</ul>
			</li>
		</ul>
	</nav>
</div>
<script type="text/javascript">
	$("#btnnavbar" ).click(function() {
		$('#navbar').toggle('slow');
	});
</script>