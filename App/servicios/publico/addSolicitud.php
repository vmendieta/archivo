<?php
require_once '../librerias/librerias.php';
//require_once '../librerias/seguridad.php'; 
$postData = array(  
  'responsable'=>'1',  
  'solicitante'=>'3',  
  'tipo_solicitud'=>'0', 
  'hora_solicitud' =>"'08:23'",
  'id_investigador' =>'1',
  'id_documento' =>'1',
  'l_formato' =>"'Impreso'",
  'l_fec_entrega' =>'now()',
  'l_fec_devol' =>'now()',
  'l_hora_entrega' =>'now()',
  'l_hora_devol' =>'now()',
  'd_fec_hora_entrega' =>'NULL',
  'd_fec_hora_devol' =>'NULL',
  'c_fec_hora_entrega' =>'NULL',
  'c_fec_hora_devol' =>'NULL',
  'e_fec_inicio' =>'NULL',
  'e_fec_fin' =>'NULL',
  'e_lugar' =>'NULL',
  'e_motivo' =>'NULL',
  'v_fec_hora_entrega' =>'NULL',
  'v_fec_hora_devol' =>'NULL',
  'v_institucion' =>'NULL',
  'v_cant_alumnos' =>'NULL' 
  
  );  
//echo $postData;exit;
  $ch = curl_init();  
  curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/addSolicitud");   
  curl_setopt($ch, CURLOPT_HEADER, false);  
  curl_setopt($ch, CURLOPT_POST, true);
  //http_build_query => Generar una cadena de consulta codificada estilo URL a partir de array  
  curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postData));  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
  $data = curl_exec($ch);  
  print_r($data);  
  curl_close($ch);
 // return $data;