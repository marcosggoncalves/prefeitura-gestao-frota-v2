<div class="navbar">
		<div class="iconlogo">
			<a ><i id="btnnavbar" class="material-icons">dehaze</i>Menu</a>
		</div>
			<nav id="navbar">
				<ul>
					<a href="<?=base_url('painel')?>"><li >Dashboard</li></a>
					<li>
						<a>Registrar</a>
						<ul>
							<a href="<?=base_url('registrar/saida/manuntencao')?>"><li>Saida manuntenção</li></a>
							<a href="<?=base_url('registrar/troca/oleo')?>"><li>Troca de oléo</li></a>
							<a href="<?=base_url('registrar/retirada/produto')?>"><li>Retirada produto</li></a>
						</ul>
					</li>
					<li>
						<a>Cadastrar</a>
						<ul>
							<a href="<?=base_url('cadastrar/veiculo') ?>"><li>Veiculos</li></a>
							<a href="<?=base_url('cadastrar/categoria')?>"><li>Categorias</li></a>
							<a href="<?=base_url('cadastrar/produto')?>"><li>Produtos</li></a>
						</ul>
					</li>
					<li>
						<a>Relatórios</a>
						<ul>
							<a href='../relatorios/relatorio_retirada_produto'><li>Produtos retirados</li></a>
							<a href='../relatorios/relatorio_saida_manuntencao'><li>Saida manuntenção</li></a>
							<a href='../relatorios/relatorio_todas_troca_oleo'><li>Troca óleo</li></a>
							<a href='../relatorios/relatorio_todos_veiculos'><li>Veiculos</li></a>
							<a href='../relatorios/relatorio_todos_produtos'><li>Produtos</li></a>
						</ul>
					</li>
					<a href='../relatorios/relatorio_filtro'><li>Relatórios mensais</li></a>
					<li>
						<a>Usuários</a>
						<ul>
							<a href="<?=base_url('usuario/editar/'.$this->session->logado[0]->id_usuario.'')?>"><li>Dados pessoais</li></a>
							<a href="<?=base_url('usuario/cadastrar')?>"><li>Cadastrar</li></a>
							<a href="<?=base_url('usuario/todos')?>"><li>Cadastrados</li></a>
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