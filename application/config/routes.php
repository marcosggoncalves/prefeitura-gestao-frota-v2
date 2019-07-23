<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//login 

$route['entrar'] = 'login/entrar';
$route['sair'] = 'login/encerrar_session';


//painel - adm

$route['painel'] = 'painel';



