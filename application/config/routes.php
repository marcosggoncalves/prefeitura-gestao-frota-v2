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
