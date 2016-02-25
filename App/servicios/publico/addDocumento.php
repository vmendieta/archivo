<?php
require_once '../librerias/librerias.php';
//require_once '../librerias/seguridad.php'; 
$postData = array(  
  'seccion'=>'',  
  'volumen'=>'22',  
  'numero' =>'1',  
  );  
  /*$ch = curl_init();  
  curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/addDocumento");  
  curl_setopt($ch, CURLOPT_HEADER, false);  
  curl_setopt($ch, CURLOPT_POST, true);  
  //http_build_query => Generar una cadena de consulta codificada estilo URL a partir de array  
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
  $data = curl_exec($ch);  
  print_r($data);  
  curl_close($ch);  */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/addDocumento");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
//http_build_query => Generar una cadena de consulta codificada estilo URL a partir de array
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//$data =  json_decode(curl_exec($ch),true);
$data =  curl_exec($ch);
print_r($data);print_r($postData);exit;
curl_close($ch);