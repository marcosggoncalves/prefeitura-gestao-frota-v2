<div class="navbar">
		<div class="iconlogo">
			<a ><i id="btnnavbar" class="material-icons">dehaze</i>Menu</a>
		</div>
			<nav id="navbar">
				<ul>
					<a href="../relatorios/painel"><li >Home</li></a>
					<li>
						<a>Registrar</a>
						<ul>
							<a href='../forms/cadastrar_saida_manuntencao'><li>Saida manuntenção</li></a>
							<a href='../forms/cadastrar_troca_oleo'><li>Troca de óleo</li></a>
							<a href='../forms/cadastrar_retirada_produto'><li>Retirada produto</li></a>
						</ul>
					</li>
					<li>
						<a>Cadastrar</a>
						<ul>
							<a href='../forms/cadastrar_veiculo'><li>Veiculos</li></a>
							<a href='../forms/cadastrar_categoria'><li>Categorias</li></a>
							<a href='../forms/cadastrar_produto'><li>Produtos</li></a>
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
						<a>Configurações</a>
						<ul>
							<a href='../forms/editar_usuario'><li>Dados pessoais</li></a>
							<?php 

								if($_SESSION["user"]['setor_usuario'] == 'T.I' || $_SESSION["user"]['setor_usuario'] == 'Adm' ){
									echo "<a href='../forms/cadastrar_usuario'><li>Novo usuário</li></a>
									<a href='../relatorios/relatorio_todos_usuarios'><li>Usuários</li></a>";
								}

							 ?>
							
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