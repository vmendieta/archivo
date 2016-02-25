<?php
require_once '../librerias/librerias.php';
//require_once '../librerias/seguridad.php'; 
$postData = array( 
  'id_documento'=>'3', 
  'registro'=>'1252155',  
  'anio'=>'2015',  
  'pagina' =>'122',  
  );  
  $ch = curl_init();  
  //print_r($postData);
  curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/IngresoDoc");  
  curl_setopt($ch, CURLOPT_HEADER, false);  
  curl_setopt($ch, CURLOPT_POST, true);  
  //http_build_query => Generar una cadena de consulta codificada estilo URL a partir de array  
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
  $data = curl_exec($ch);  
  print_r($data);  
  curl_close($ch);  