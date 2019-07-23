<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$autoload['packages'] = array();


$autoload['libraries'] = array('database','session','form_validation','pagination');


$autoload['drivers'] = array();


$autoload['helper'] = array('url','form','calc_date');


$autoload['config'] = array();


$autoload['language'] = array();


$autoload['model'] = array('Dao_login','Dao_painel');
