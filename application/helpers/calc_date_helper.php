<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function dataDiferenca($data1,$data2){
	  $datatime1 = new DateTime($data1);
	  $datatime2 = new DateTime($data2);
	  $data1  = $datatime1->format('Y-m-d H:i:s');
	  $data2  = $datatime2->format('Y-m-d H:i:s');
	  $diff = $datatime1->diff($datatime2);
	 
	 return $thoras =  ($diff->days) . ' - Dias';
}
function diferencakm($km1,$km2){
	$diferenca = ceil($km1 - $km2);
	if($diferenca < 0){
		$diferenca = $diferenca * -1;
	}
	return $diferenca. ' - Km aproximado';
}
function formatData($datatime){
	if($datatime == null){
	  	return 'Veiculo não retorno';
	}
	return (new DateTime($datatime))->format('d/m/Y H:i:s');	
}
function registraLog($log,$execução){
	if(!file_exists('logs')){
		mkdir('logs',0700,true);
	}
	$arquivo = './logs/log.txt';
	$conexao_arquivo = fopen($arquivo, "a+");
	fwrite($conexao_arquivo, 'Realizado em: '.date('Y-m-d H:i:s').' - '.$log.' - ('.$execução.');'.'<br>');
	fclose($conexao_arquivo);
}
function logs(){
	if(file_exists('logs')){
		$arquivo = './logs/log.txt';
		$conexao_arquivo = fopen($arquivo, "r");
		while(!feof($conexao_arquivo)){
			$linha = fgets($conexao_arquivo,4096);
			echo '<p>'.$linha.'</p>';
		}
		fclose($conexao_arquivo);
	}else{
		return '<p>Não há processos registrados no sistema.</p>';
	}
}