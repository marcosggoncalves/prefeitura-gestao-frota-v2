<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Rotas estão dividindo por abas da navegação


//login 

$route['entrar'] = 'login/entrar';
$route['sair'] = 'login/encerrar_session';


//painel - adm

$route['painel'] = 'painel';


//Registrar 

$route['registrar/saida/manuntencao'] = 'manuntencao';
$route['registrar/saida/manuntencao/salvar'] = 'manuntencao/salvar_saida_manuntencao';
$route['registrar/troca/oleo'] = 'troca';
$route['registrar/troca/oleo/salvar'] = 'troca/troca_oleo_salvar';
$route['registrar/retirada/produto'] = 'retirada_produto';
$route['registrar/retirada/produto/salvar'] = 'retirada_produto/retirada_produto_salvar'; 


// cadastrar


$route['cadastrar/veiculo'] = 'veiculo';
$route['cadastrar/veiculo/salvar'] = 'veiculo/veiculo_salvar';
$route['cadastrar/produto'] = 'produto';
$route['cadastrar/produto/salvar'] = 'produto/produto_salvar';
$route['cadastrar/categoria'] = 'categoria';
$route['cadastrar/categoria/salvar'] = 'categoria/categoria_salvar';



// Usuários

$route['usuario/editar/(:any)'] ='usuario/editar/$1';
$route['usuario/editar/salvar/(:any)'] ='usuario/editar_salvar/$1';
$route['usuario/todos'] ='usuario/todos_usuario';
$route['usuario/cadastrar'] ='usuario/cadastrar';
$route['usuario/cadastrar/salvar'] ='usuario/cadastrar_salvar';
$route['usuario/bloquear/(:any)'] ='usuario/bloquear_usuario/$1';
$route['usuario/desbloquear/(:any)'] ='usuario/desbloquear_usuario/$1';
$route['usuario/deletar/(:any)'] ='usuario/deletar_usuario/$1';


//relatorios

$route['relatorio-produtos-retirados'] = 'retirada_produto/produtos_retirados';
$route['relatorio-produtos-retirados/(:num)'] = 'retirada_produto/produtos_retirados';
$route['relatorio-saida-manuntencao'] = 'manuntencao/relatorio_saida_manuntencao';
$route['relatorio-saida-manuntencao/(:num)'] = 'manuntencao/relatorio_saida_manuntencao';
$route['relatorio-troca-oleo'] = 'troca/relatorio_troca_oleo';
$route['relatorio-troca-oleo/(:num)'] = 'troca/relatorio_troca_oleo';
$route['relatorio-veiculos'] = 'veiculo/relatorio_veiculos';
$route['relatorio-veiculos/(:num)'] = 'veiculo/relatorio_veiculos';
$route['relatorio-produtos'] = 'produto/relatorio_produtos';
$route['relatorio-produtos/(:num)'] = 'produto/relatorio_produtos';


// saida manuntenção


$route['saida-manuntencao-visualizar/(:any)'] ='manuntencao/saida_manuntencao_visualizar/$1';
$route['saida-manuntencao-deletar/(:any)'] ='manuntencao/saida_manuntencao_deletar/$1';
$route['saida-manuntencao-status/(:any)/(:any)'] ='manuntencao/alterar_status_saida_manuntencao/$1/$2';
$route['saida-manuntencao-finalizar/(:any)'] ='manuntencao/finalizar_saida_manuntencao/$1';
$route['saida-manuntencao-finalizar-salvar/(:any)'] = 'manuntencao/finalizar_saida_manuntencao_salvar/$1';


// produtos

$route['produto-editar/(:any)'] = 'produto/editar_produto/$1';
$route['produto-editar-salvar/(:any)'] = 'produto/editar_produto_salvar/$1';
$route['produto-deletar/(:any)'] = 'produto/deletar_produto/$1';

// veiculos

$route['veiculo-editar/(:any)'] = 'veiculo/editar_veiculo/$1';
$route['veiculo-editar-salvar/(:any)'] = 'veiculo/editar_veiculo_salvar/$1';
$route['veiculo-deletar/(:any)'] = 'veiculo/deletar_veiculo/$1';


// troca oleo

$route['troca-oleo-editar-km/(:any)'] = 'troca/editar_troca_oleo/$1';
$route['troca-oleo-editar-km-salvar/(:any)'] = 'troca/editar_troca_oleo_salvar/$1';
$route['troca-oleo-deletar/(:any)'] = 'troca/deletar_troca/$1';


//logs


$route['config/logs'] = 'logs';