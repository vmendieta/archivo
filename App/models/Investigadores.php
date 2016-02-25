<?php
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\Crud;

class Investigadores implements Crud
{
	public static function addInvestigador($nombre,$apellido,$ci,$nacionalidad,$direccion,$email,$telefono,$tema)
	{
		require_once '../../servicios/librerias/librerias.php';
	
		$nombre=$_POST["nombre"];
		$apellido=$_POST["apellido"];
		$ci=$_POST["ci"];
		$nacionalidad=$_POST["nacionalidad"];
		$direccion=$_POST["direccion"];
		$email=$_POST["email"];
		$telefono=$_POST["telefono"];
		$tema=$_POST["tema"];
		
		$postData = array(
				
				'nombre'=>$nombre,
				'apellido'=>$apellido,
				'ci'=>$ci,
				'nacionalidad'=>$nacionalidad,
				'direccion'=>$direccion,
				'email'=>$email,
				'telefono'=>$telefono,
				'tema'=>$tema,
		);
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/addInvestigador");
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
	
	
	public static function getAll()
	{
		require_once '../../servicios/librerias/librerias.php';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/investigadores");
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		$data = json_decode(curl_exec($ch),true);
		//$data = curl_exec($ch);
		//print_r($data);exit;
		curl_close($ch);
		/*if(!$data) {
			return false;
		}else{
			return $data;
				
		}*/
		return $data;
	}

	public static function getById($id)
	{
		try {
			$connection = Database::instance();
			$sql = "SELECT * from usuarios WHERE id = ?";
			$query = $connection->prepare($sql);
			$query->bindParam(1, $id, \PDO::PARAM_INT);
			$query->execute();
			return $query->fetch();
		}
		catch(\PDOException $e)
		{
			print "Error!: " . $e->getMessage();
		}
	}

	public static function getExistInvestigador($ci)
	{
		require_once '../../servicios/librerias/librerias.php';
		 
		$postData = array(
				'ci'=>$ci,
				
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/existeInvestigador");
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

