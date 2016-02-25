<?php
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\Crud;

class Documentos implements Crud
{
	public static function addDocumento($seccion,$volumen,$numero)
	{
		require_once '../../servicios/librerias/librerias.php';
		
		if ($_POST["volumen"]===NULL||$_POST["volumen"]===""){
			return false;
			
		}
		if ($_POST["seccion"]===NULL||$_POST["seccion"]===""){
			//echo $_POST["volumen"]; exit;
			$seccion=NULL;
			$volumen=$_POST["volumen"];
			$numero=$_POST["numero"];
		}
		if ($_POST["numero"]===NULL||$_POST["numero"]===""){
			$numero='';
			$volumen=$_POST["volumen"];
			$seccion=$_POST["seccion"];
		}
		if ($_POST["numero"]!==NULL&&$_POST["numero"]!==""&&$_POST["seccion"]!==NULL&&$_POST["seccion"]!==""){
			//echo $_POST["numero"]; exit;
			$numero=$_POST["numero"];;
			$volumen=$_POST["volumen"];
			$seccion=$_POST["seccion"];
			
		}
		$numero=$_POST["numero"];;
			$volumen=$_POST["volumen"];
			$seccion=$_POST["seccion"];
		$postData = array(
				'seccion'=>$seccion,
				'volumen'=>$volumen,
				'numero'=>$numero,	
		);
	
	    $ch = curl_init();  
 		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/addDocumento");   
  		curl_setopt($ch, CURLOPT_HEADER, false);  
  		curl_setopt($ch, CURLOPT_POST, true);  		
  		//http_build_query => Generar una cadena de consulta codificada estilo URL a partir de array  
  		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postData));   		
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
  		$data =  json_decode(curl_exec($ch),true);
  		//print_r($postData);print_r($data);exit;
  		curl_close($ch);
  		if(!$data) {
  			return false;
  			
  		}else{
  			if($data["estado"]!="correcto") {
  				return false;
  			}else{
  			    return $data;
  			}
  			
  		}
	}
	public static function addIngresoDoc($id_documento,$registro,$anio,$pagina)
	{
		require_once '../../servicios/librerias/librerias.php';
	
		$id_documento=$_POST["id_documento"];
		$registro=$_POST["registro"];
		$anio=$_POST["anio"];
		$pagina=$_POST["pagina"];
		$postData = array(
				'id_documento'=>$id_documento,
				'registro'=>$registro,
				'anio'=>$anio,
				'pagina'=>$pagina,
		);
	
		$ch = curl_init();  
  		//print_r($postData);
  		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/IngresoDoc");  
  		curl_setopt($ch, CURLOPT_HEADER, false);  
  		curl_setopt($ch, CURLOPT_POST, true);  
  		//http_build_query => Generar una cadena de consulta codificada estilo URL a partir de array  
  		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));  
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
  		$data = json_decode(curl_exec($ch),true);  
  		//print_r($data);  exit;
  		curl_close($ch);  
		if(!$data) {
			return false;
				
		}else{
			if($data["estado"]!="correcto") {
				return false;
			}else{
				return $data;
			}
				
		}
	}
	
	
	public static function getAll()
	{
		require_once '../../servicios/librerias/librerias.php';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/documentos");
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		$data = json_decode(curl_exec($ch),true);
		//$data = curl_exec($ch);
		
		curl_close($ch);
		if(!$data) {
			return false;
		}else{
			return $data;
				
		}
	}

	public static function getById($id)
	{
		
	}

	public static function getExistDocumento($id)
	{

	}

	public static function insert($user)
	{

	}

	public static function update($user)
	{

	}

	public static function delete($id)
	{

	}
}
