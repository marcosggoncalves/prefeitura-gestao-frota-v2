<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function data_diferença($data1,$data2){
	  $datatime1 = new DateTime($data1);
	  $datatime2 = new DateTime($data2);
	  $data1  = $datatime1->format('Y-m-d H:i:s');
	  $data2  = $datatime2->format('Y-m-d H:i:s');
	  $diff = $datatime1->diff($datatime2);
	 
	 return $thoras =  ($diff->days) . ' - Dias';
}
function diferença_km($km1,$km2){
	$diferenca = ceil($km1 - $km2);
	if($diferenca < 0){
		$diferenca = $diferenca * -1;
	}
	return $diferenca. ' - Km aproximado';
}
function formatdata($datatime){
	if($datatime == null){
	  	return 'Veiculo não retorno';
	}else{
		return (new DateTime($datatime))->format('d/m/Y H:i:s');	
	}
}
function registra_log($log,$execução){
	if(!file_exists('logs')){
		mkdir('logs',0700,true);
	}
	$arquivo = './logs/log.txt';
	$conexão_arquivo = fopen($arquivo, "a+");
	fwrite($conexão_arquivo, 'Realizado em: '.date('Y-m-d H:i:s').' - '.$log.' - ('.$execução.');'.'<br>');
	fclose($conexão_arquivo);
}
function logs(){
	if(file_exists('logs')){
		$arquivo = './logs/log.txt';
		$conexão_arquivo = fopen($arquivo, "r");
		while(!feof($conexão_arquivo)){
			$linha = fgets($conexão_arquivo,4096);
			echo '<p>'.$linha.'</p>';
		}
		fclose($conexão_arquivo);
	}else{
		return '<p>Não há processos registrados no sistema.</p>';
	}
}