<?php
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\Crud;

class InformesConsultas implements Crud
{
	public static function reportConsultas($mes,$anio)
	{
		require_once '../../servicios/librerias/librerias.php';
		 
		$postData = array(
				'mes'=>$mes,
				'anio' =>$anio
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/reportConsultas");
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//$data = curl_exec($ch);

		$data = json_decode(curl_exec($ch),true);
		curl_close($ch);
		//print_r($data);exit;
		return $data;
	}
	
	public static function reportMaterialesConsultados($mes,$anio)
	{
		require_once '../../servicios/librerias/librerias.php';
			
		$postData = array(
				'mes'=>$mes,
				'anio' =>$anio
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/reportMaterialesConsultados");
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//$data = curl_exec($ch);
	
		$data = json_decode(curl_exec($ch),true);
		curl_close($ch);
		//print_r($data);exit;
		return $data;
	}

	public static function reportVisitasGuiadas($mes,$anio)
	{
		require_once '../../servicios/librerias/librerias.php';
			
		$postData = array(
				'mes'=>$mes,
				'anio' =>$anio
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/reportVisitasGuiadas");
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//$data = curl_exec($ch);
	
		$data = json_decode(curl_exec($ch),true);
		curl_close($ch);
		//print_r($data);exit;
		return $data;
	}
	
	public static function reportDigitalizados($mes,$anio)
	{
		require_once '../../servicios/librerias/librerias.php';
			
		$postData = array(
				'mes'=>$mes,
				'anio' =>$anio
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/reportDigitalizados");
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//$data = curl_exec($ch);
	
		$data = json_decode(curl_exec($ch),true);
		curl_close($ch);
		//print_r($data);exit;
		return $data;
	}
	
	public static function getAll()
	{
	
	}
	
	public static function getById($id)
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
