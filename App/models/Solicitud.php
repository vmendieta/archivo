<?php
namespace App\Models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\Interfaces\Crud;

class Solicitud implements Crud

{
  /*private $id_solicitud ;
  private $responsable;
  private $solicitante;
  private $tipo_solicitud;
  private $id_investigador;
  private $id_documento;
  private $l_formato ;
  private $l_fec_entrega ;
  private $l_hora_entrega ;
  private $l_fec_devol;
  private $l_hora_devol;
  private $d_fec_hora_entrega ;
  private $d_fec_hora_devol;
  private $c_fec_hora_entrega ;
  private $c_fec_hora_devol ;
  private $e_fec_inicio ;
  private $e_fec_fin; 
  private $e_lugar; 
  private $e_motivo ;
  private $v_fec_hora_entrega;
  private $v_fec_hora_devol;
  private $v_institucion; 
  private $v_cant_alumnos ;
  private $fec_hora_solicitud;*/

  
  	public static function addSolicitud($responsable,$solicitante,$hora_solicitud,$tipo_solicitud,
  			$id_investigador,$id_documento,$l_formato,$l_fec_devol,$l_fec_entrega,$l_hora_entrega,
  			$l_hora_devol,$d_fec_hora_entrega,$d_fec_hora_devol,$c_fec_hora_entrega,$c_fec_hora_devol,
  			$e_fec_inicio,$e_fec_fin,$e_lugar,$e_fec_fin,$e_lugar,$e_motivo,$v_fec_entrega,
  			$v_fec_devol,$v_hora_entrega,$v_hora_devol,$v_institucion,$v_cant_alumnos)
	{
		require_once '../../servicios/librerias/librerias.php';
		if (isset($_POST["tipo_solicitud"])){
			if ($_POST["tipo_solicitud"]==0){
				$responsable=$_SESSION["id_usuario"];
				$solicitante=$_POST["solicita"];
				$hora_solicitud="'".$_POST["dtp_input3"]."'";
				$tipo_solicitud=$_POST["tipo_solicitud"];
				$id_investigador=$_POST["investigador"];
				$id_documento=$_POST["id_documento"];
				$l_formato="'".$_POST["formato"]."'";
				$l_fec_entrega="'".$_POST["dtp_input31"]."'";
				$l_hora_entrega="'".$_POST["dtp_input31h"]."'";
				$l_fec_devol="'".$_POST["fec_devol_lectura_hidden"]."'";
				$l_hora_devol="'".$_POST["dtp_input32h"]."'";
				$d_fec_hora_entrega='NULL';
				$d_fec_hora_devol='NULL';
				$c_fec_hora_entrega='NULL';
				$c_fec_hora_devol='NULL';
				$e_fec_inicio='NULL';
				$e_fec_fin='NULL';
				$e_lugar='NULL';
				$e_motivo='NULL';
				$v_fec_entrega='NULL';
				$v_fec_devol='NULL';
				$v_hora_entrega='NULL';
				$v_hora_devol='NULL';
				$v_institucion='NULL';
				$v_cant_alumnos='NULL';
				
							
				if ($l_fec_entrega!== $l_fec_devol){
					return false;
				}
				
				if ($l_hora_entrega>$l_hora_devol){
					return false;
				}
			}
			if ($_POST["tipo_solicitud"]==1){
				$responsable=$_SESSION["id_usuario"];
				$solicitante=$_POST["solicita"];
				$hora_solicitud="'".$_POST["dtp_input3"]."'";
				$tipo_solicitud=$_POST["tipo_solicitud"];
				$id_investigador='NULL';
				$id_documento=$_POST["id_documento"];
				$l_formato='NULL';
				$l_fec_entrega='NULL';
				$l_hora_entrega='NULL';
				$l_fec_devol='NULL';
				$l_hora_devol='NULL';
				$d_fec_hora_entrega="'".$_POST["dtp_input311"]."'";
				$d_fec_hora_devol="'".$_POST["dtp_input322"]."'";
				$c_fec_hora_entrega='NULL';
				$c_fec_hora_devol='NULL';
				$e_fec_inicio='NULL';
				$e_fec_fin='NULL';
				$e_lugar='NULL';
				$e_motivo='NULL';
				$v_fec_entrega='NULL';
				$v_fec_devol='NULL';
				$v_hora_entrega='NULL';
				$v_hora_devol='NULL';
				$v_institucion='NULL';
				$v_cant_alumnos='NULL';
				
				if ($d_fec_hora_entrega>$d_fec_hora_devol){
					return false;
				}
			}
			
			if ($_POST["tipo_solicitud"]==2){
				$responsable=$_SESSION["id_usuario"];
				$solicitante=$_POST["solicita"];
				$hora_solicitud="'".$_POST["dtp_input3"]."'";
				$tipo_solicitud=$_POST["tipo_solicitud"];
				$id_investigador='NULL';
				$id_documento=$_POST["id_documento"];
				$l_formato='NULL';
				$l_fec_entrega='NULL';
				$l_hora_entrega='NULL';
				$l_fec_devol='NULL';
				$l_hora_devol='NULL';
				$d_fec_hora_entrega='NULL';
				$d_fec_hora_devol='NULL';
				$c_fec_hora_entrega="'".$_POST["dtp_conserva1"]."'";
				$c_fec_hora_devol="'".$_POST["dtp_conserva2"]."'";
				$e_fec_inicio='NULL';
				$e_fec_fin='NULL';
				$e_lugar='NULL';
				$e_motivo='NULL';
				$v_fec_entrega='NULL';
				$v_fec_devol='NULL';
				$v_hora_entrega='NULL';
				$v_hora_devol='NULL';
				$v_institucion='NULL';
				$v_cant_alumnos='NULL';
				
				if ($c_fec_hora_entrega>$c_fec_hora_devol){
					return false;
				}
			}
			
			if ($_POST["tipo_solicitud"]==3){
				$responsable=$_SESSION["id_usuario"];
				$solicitante=$_POST["solicita"];
				$hora_solicitud="'".$_POST["dtp_input3"]."'";
				$tipo_solicitud=$_POST["tipo_solicitud"];
				$id_investigador='NULL';
				$id_documento=$_POST["id_documento"];
				$l_formato='NULL';
				$l_fec_entrega='NULL';
				$l_hora_entrega='NULL';
				$l_fec_devol='NULL';
				$l_hora_devol='NULL';
				$d_fec_hora_entrega='NULL';
				$d_fec_hora_devol='NULL';
				$c_fec_hora_entrega='NULL';
				$c_fec_hora_devol='NULL';
				$e_fec_inicio="'".$_POST["dtp_expo1"]."'";
				$e_fec_fin="'".$_POST["dtp_expo2"]."'";
				$e_lugar="'".$_POST["lugarexpo"]."'";
				$e_motivo="'".$_POST["motivoexpo"]."'";
				$v_fec_entrega='NULL';
				$v_fec_devol='NULL';
				$v_hora_entrega='NULL';
				$v_hora_devol='NULL';
				$v_institucion='NULL';
				$v_cant_alumnos='NULL';
				
				if ($e_fec_inicio>$e_fec_fin){
					return false;
				}
			}
			
			if ($_POST["tipo_solicitud"]==4){
				$responsable=$_SESSION["id_usuario"];
				$solicitante=$_POST["solicita"];
				$hora_solicitud="'".$_POST["dtp_input3"]."'";
				$tipo_solicitud=$_POST["tipo_solicitud"];
				$id_investigador='NULL';
				$id_documento=$_POST["id_documento"];
				$l_formato='NULL';
				$l_fec_entrega='NULL';
				$l_hora_entrega='NULL';
				$l_fec_devol='NULL';
				$l_hora_devol='NULL';
				$d_fec_hora_entrega='NULL';
				$d_fec_hora_devol='NULL';
				$c_fec_hora_entrega='NULL';
				$c_fec_hora_devol='NULL';
				$e_fec_inicio='NULL';
				$e_fec_fin='NULL';
				$e_lugar='NULL';
				$e_motivo='NULL';
				$v_fec_entrega="'".$_POST["dtp_visita_fec1"]."'";
				$v_fec_devol="'".$_POST["dtp_visita_fec2"]."'";
				$v_hora_entrega="'".$_POST["dtp_visita_hora1"]."'";
				$v_hora_devol="'".$_POST["dtp_visita_hora2"]."'";
				$v_institucion="'".$_POST["institucion"]."'";
				$v_cant_alumnos="'".$_POST["alumnos"]."'";
				
				
				if ($v_fec_entrega!== $v_fec_devol){
					return false;
				}
				
				if ($v_hora_entrega>$v_hora_devol){
					return false;
				}
			}
		}
		$postData = array(  
  		'responsable'=>$responsable,  
  		'solicitante'=>$solicitante,  
  		'tipo_solicitud'=>$tipo_solicitud, 
 		'hora_solicitud' =>$hora_solicitud,
  		'id_investigador' =>$id_investigador,
  		'id_documento' =>$id_documento,
  		'l_formato' =>$l_formato,
  		'l_fec_entrega' =>$l_fec_entrega,
  		'l_fec_devol' =>$l_fec_devol,
  		'l_hora_entrega' =>$l_hora_entrega,
  		'l_hora_devol' =>$l_hora_devol,
 		'd_fec_hora_entrega' =>$d_fec_hora_entrega,
  		'd_fec_hora_devol' =>$d_fec_hora_devol,
  		'c_fec_hora_entrega' =>$c_fec_hora_entrega,
  		'c_fec_hora_devol' =>$c_fec_hora_devol,
  		'e_fec_inicio' =>$e_fec_inicio,
  		'e_fec_fin' =>$e_fec_fin,
  		'e_lugar' =>$e_lugar,
  		'e_motivo' =>$e_motivo,
  		'v_fec_entrega' =>$v_fec_entrega,
  		'v_fec_devol' =>$v_fec_devol,
	    'v_hora_entrega' =>$v_hora_entrega,
		'v_hora_devol' =>$v_hora_devol,
  		'v_institucion' =>$v_institucion,
  		'v_cant_alumnos' =>$v_cant_alumnos 
  
  		);  
		
  		$ch = curl_init();  
 		curl_setopt($ch, CURLOPT_URL, "http://localhost/servicios/addSolicitud");   
  		curl_setopt($ch, CURLOPT_HEADER, false);  
  		curl_setopt($ch, CURLOPT_POST, true);  		
  		//http_build_query => Generar una cadena de consulta codificada estilo URL a partir de array  
  		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postData));   		
  		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
  		$data =  json_decode(curl_exec($ch),true);
  		//print_r($postData);exit;
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
	
	public static function getAll(){
		
	}
	public static function getById($id){
		
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
