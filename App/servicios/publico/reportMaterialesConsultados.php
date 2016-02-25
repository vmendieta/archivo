<?php
$postData = array(  
  'mes'=>'02',  
  'anio' =>'2016'  
  );  
  $ch = curl_init();  
  curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/reportMaterialesConsultados");  
  curl_setopt($ch, CURLOPT_HEADER, false);  
  curl_setopt($ch, CURLOPT_POST, true);  
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
  $data = curl_exec($ch);  
  
 print_r($data); 
  curl_close($ch);
 // return $data;
?>
