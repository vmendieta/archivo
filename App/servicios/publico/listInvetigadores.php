<?php
require_once '../librerias/librerias.php';
//require_once '../librerias/seguridad.php';

  $ch = curl_init();  
  curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/investigadores");  
  curl_setopt($ch, CURLOPT_HEADER, false);  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
  //$data = json_decode(curl_exec($ch),true);  
  $data = curl_exec($ch);  
  print_r($data);  
  curl_close($ch);  
?>
     
  

