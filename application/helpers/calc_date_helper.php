<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function data_diferença($data1,$data2){
	  $datatime1 = new DateTime($data1);
	  $datatime2 = new DateTime($data2);
	  $data1  = $datatime1->format('Y-m-d H:i:s');
	  $data2  = $datatime2->format('Y-m-d H:i:s');
	  $diff = $datatime1->diff($datatime2);
	 
	 return $thoras =  ($diff->days) . ' - Dias';
}