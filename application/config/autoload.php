<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$autoload['packages'] = array();


$autoload['libraries'] = array('database','session','form_validation','pagination');


$autoload['drivers'] = array();


$autoload['helper'] = array('url','form','calc_date','date');


$autoload['config'] = array();


$autoload['language'] = array();


$autoload['model'] = array('Dao_produto','Dao_veiculo','Dao_categoria','Dao_login','Dao_painel','Dao_manuntencao','Dao_troca','Dao_retirada_produto','Dao_usuario');
