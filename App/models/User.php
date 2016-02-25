<?php
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\Crud;

class User implements Crud
{
    public static function getAll()
    {
       /* try {
			$connection = Database::instance();
			$sql = "SELECT * from usuarios";
			$query = $connection->prepare($sql);
			$query->execute();
			return $query->fetchAll();
		}
        catch(\PDOException $e)
        {
			print "Error!: " . $e->getMessage();
		}*/
		require_once '../../servicios/librerias/librerias.php';
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/usuarios");  
		curl_setopt($ch, CURLOPT_HEADER, false);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        $data = json_decode(curl_exec($ch),true); 		
		//$data = curl_exec($ch);  
		curl_close($ch);
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
    
    public static function getExistUser($username,$password)
    {
    	require_once '../../servicios/librerias/librerias.php';
    	
    	$postData = array(  
  			'username'=>$username,  
  			'password' =>$password  
  		);  
 		$ch = curl_init();  
 		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/login");  
  		curl_setopt($ch, CURLOPT_HEADER, false);  
  		curl_setopt($ch, CURLOPT_POST, true);  
  		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));  
 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
  		//$data = curl_exec($ch);  
  
    	$data = json_decode(curl_exec($ch),true);
    	curl_close($ch);
    	if($data["estado"]!=="error" ){
    	$_SESSION["id_usuario"]=$data["usuario"]["id_usuario"];
    	$_SESSION["username"]=$data["usuario"]["username"];
    	$_SESSION["nombres"]=$data["usuario"]["nombres"];
    	$_SESSION["apellidos"]=$data["usuario"]["apellidos"];
    	$_SESSION["nombre_apellido"]=$data["usuario"]["nombres"]." ".$data["usuario"]["apellidos"];
    	$_SESSION["ci"]=$data["usuario"]["ci"];
    	$_SESSION["email"]=$data["usuario"]["email"];
    	//print_r($data);print_r(md5($password));exit;
    	return $data;
    	}else{ return false;
    	}
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
