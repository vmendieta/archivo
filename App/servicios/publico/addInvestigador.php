<?php
require_once '../librerias/librerias.php';
//require_once '../librerias/seguridad.php'; 
$postData = array(  
  'nombres'=>'Juan',  
  'apellidos'=>'Mendieta',  
  'email' =>'prueba11@ejemplo.com'  ,
  'ci'=>'45123544', 
  'nacionalidad'=>'paraguayo', 
  'tema'=>'Mcal Solano Lopez', 
  );  
  $ch = curl_init();  
  curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/addInvestigador");  
  curl_setopt($ch, CURLOPT_HEADER, false);  
  curl_setopt($ch, CURLOPT_POST, true);  
  //http_build_query => Generar una cadena de consulta codificada estilo URL a partir de array  
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
  $data = curl_exec($ch);  
  print_r($data);  
  curl_close($ch);  