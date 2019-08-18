<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_controller{
	public function index(){
		$this->load->view('relatorios/logs');
	}
}