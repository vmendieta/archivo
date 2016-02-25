<?php
namespace App\Controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View,
    \App\Models\User as Users,
    \App\Models\Solicitud as Solicitud,
    \App\Models\Documentos as Documentos,
    \App\Models\Investigadores as Investigadores,
    \App\Models\InformesConsultas as Informes,
    \Core\Controller,
    \Core\Url as Url;

class Home extends Controller
{

    public function index()
    {
    	
    	if (!isset($_SESSION['username'])) {
    		
    		if (isset($_POST["username"])){
    		
				$username=$_POST["username"];
					$password=$_POST["password"];
			
				$users="";
				$users = Users::getExistUser($username,$password);
				//echo $users;exit;
				if($users){			
				
					View::set("users", $users["usuario"]);
					View::set("title", "Inicie Sesion");
					View::render("inicio");
				
				}else{
					//echo "No esta logueado";
					//echo "index loguearse1";exit;
					//View::set("title", "Loguearse");
					//View::render("index");//Index de iniciar sesion
					Url::redirect('archivo/public/home');
				}
				
			}
    	 	else{
				
				View::set("title", "Loguearse");
				View::render("index");//Index de iniciar sesion
    	 		
    	 	}
    	}else{
				
			View::set("title", "Loguearse");
			View::render("inicio");//Index de iniciar sesion
    					
		}
		
    }
  
    public function logout()
    {
    	 
    	
    	session_unset();
    	session_destroy();
    	
    	Url::redirect('archivo/public/home');
    	
    
    		
    }
    /**
     * [test description]
     * @param  [type] $user [description]
     * @param  [type] $age  [description]
     * @return [type]       [description]
     */
    public function test($user, $age)
    {
        View::set("user", $user);
        View::set("title", "Custom MVC");
        View::render("home");
    }

    //public function admin($name)
	public function admin()
    {
        $users = Users::getAll();
		View::set("users", $users["usuarios"]);
        View::set("title", "Custom MVC");
        View::render("admin");
    }

    public function user($id = 1)
    {
        $user = Users::getById($id);
        print_r($user);
    }
    public function informeconsultas()
    {
    	$users = Users::getAll();
    	View::set("mostrar","style=\"display:none;\"");
    	View::set("periodo", " ");
    	View::set("consultas", " ");
    	View::set("materiales", " ");
    	View::set("visitas", " ");
    	View::set("digitalizados", " ");    	
    	View::set("users", $users["usuarios"]);
    	View::set("title", "Informe Consultas");
    	View::render("informeconsultas");
    }
    
    public function informeconsultasshow()
    {
    	$users = Users::getAll();
    	$consultas=Informes::reportConsultas($_POST["mes"],$_POST["anio"]);
    	$materiales=Informes::reportMaterialesConsultados($_POST["mes"],$_POST["anio"]);
    	$visitas=Informes::reportVisitasGuiadas($_POST["mes"],$_POST["anio"]);
    	$digitalizados=Informes::reportDigitalizados($_POST["mes"],$_POST["anio"]);
    	//echo "informeconsultasshow";exit;
    	View::set("periodo","Periodo ".$_POST["mes"]."/".$_POST["anio"]);
    	View::set("mostrar","");
    	View::set("consultas",$consultas["reporte"]["consulta"]);
    	View::set("materiales",$materiales["reporte"]["consulta"]);
    	View::set("visitas", $visitas["reporte"]["consulta"]);
    	View::set("digitalizados", $digitalizados["reporte"]["consulta"]);
    	View::set("users", $users["usuarios"]);
    	View::set("title", "Informe Consultas");
    	View::render("informeconsultas");
    }
    public function salida()
    {
   
       	$users = Users::getAll();
       	$docs = Documentos::getAll();
       	$invs = Investigadores::getAll();
       	//print_r($docs);exit;
       	View::set("mensaje", " ");
       	View::set("users", $users["usuarios"]);
    	View::set("docs", $docs["documentos"]);
    	View::set("invs", $invs["investigador"]);
    	View::set("title", "salida");
    	View::render("salida");
    	
    }
    
    public function ingreso()
    {
    	 
    	$users = Users::getAll();
    	$docs = Documentos::getAll();
    	
    	//print_r($docs);exit;
    	View::set("mensaje", " ");
    	View::set("users", $users["usuarios"]);
    	View::set("docs", $docs["documentos"]);
    	//View::set("invs", $invs["investigador"]);
    	View::set("title", "ingreso");
    	View::render("ingreso");
    	 
    }
    
    public function addsolicitud()
    {
    	//echo $_POST["tipo_solicitud"];exit;
    	if (isset($_POST["tipo_solicitud"])){
    		if ($_POST["tipo_solicitud"]==0){
    			$responsable=$_SESSION["id_usuario"];
				$solicitante=$_POST["solicita"];
				$hora_solicitud=$_POST["dtp_input3"];
				$tipo_solicitud=$_POST["tipo_solicitud"];
				$id_investigador=$_POST["investigador"];
				$id_documento=$_POST["id_documento"];
				$l_formato=$_POST["formato"];
				$l_fec_entrega=$_POST["dtp_input31"];
				$l_hora_entrega=$_POST["dtp_input31h"];
				$l_fec_devol=$_POST["fec_devol_lectura_hidden"];
				$l_hora_devol=$_POST["dtp_input32h"];
				$d_fec_hora_entrega=NULL;
				$d_fec_hora_devol=NULL;
				$c_fec_hora_entrega=NULL;
				$c_fec_hora_devol=NULL;
				$e_fec_inicio=NULL;
				$e_fec_fin=NULL;
				$e_lugar=NULL;
				$e_motivo=NULL;
				$v_fec_entrega=NULL;
				$v_fec_devol=NULL;
				$v_hora_entrega=NULL;
				$v_hora_devol=NULL;
				$v_institucion=NULL;
				$v_cant_alumnos=NULL;
    		}
    		if ($_POST["tipo_solicitud"]==1){
    			$responsable=$_SESSION["id_usuario"];
    			$solicitante=$_POST["solicita"];
    			$hora_solicitud=$_POST["dtp_input3"];
    			$tipo_solicitud=$_POST["tipo_solicitud"];
    			$id_investigador=NULL;
    			$id_documento=$_POST["id_documento"];
    			$l_formato=NULL;
    			$l_fec_entrega=NULL;
    			$l_hora_entrega=NULL;
    			$l_fec_devol=NULL;
    			$l_hora_devol=NULL;
    			$d_fec_hora_entrega=$_POST["dtp_input311"];
    			$d_fec_hora_devol=$_POST["dtp_input322"];
    			$c_fec_hora_entrega=NULL;
    			$c_fec_hora_devol=NULL;
    			$e_fec_inicio=NULL;
    			$e_fec_fin=NULL;
    			$e_lugar=NULL;
    			$e_motivo=NULL;
    			$v_fec_entrega=NULL;
				$v_fec_devol=NULL;
				$v_hora_entrega=NULL;
				$v_hora_devol=NULL;
    			$v_institucion=NULL;
    			$v_cant_alumnos=NULL;
    		}
    		
    		if ($_POST["tipo_solicitud"]==2){
    			$responsable=$_SESSION["id_usuario"];
    			$solicitante=$_POST["solicita"];
    			$hora_solicitud=$_POST["dtp_input3"];
    			$tipo_solicitud=$_POST["tipo_solicitud"];
    			$id_investigador=NULL;
    			$id_documento=$_POST["id_documento"];
    			$l_formato=NULL;
    			$l_fec_entrega=NULL;
    			$l_hora_entrega=NULL;
    			$l_fec_devol=NULL;
    			$l_hora_devol=NULL;
    			$d_fec_hora_entrega=NULL;
    			$d_fec_hora_devol=NULL;
    			$c_fec_hora_entrega=$_POST["dtp_conserva1"];
    			$c_fec_hora_devol=$_POST["dtp_conserva2"];
    			$e_fec_inicio=NULL;
    			$e_fec_fin=NULL;
    			$e_lugar=NULL;
    			$e_motivo=NULL;
    			$v_fec_entrega=NULL;
				$v_fec_devol=NULL;
				$v_hora_entrega=NULL;
				$v_hora_devol=NULL;
    			$v_institucion=NULL;
    			$v_cant_alumnos=NULL;
    		}
    		
    		if ($_POST["tipo_solicitud"]==3){
    			$responsable=$_SESSION["id_usuario"];
    			$solicitante=$_POST["solicita"];
    			$hora_solicitud=$_POST["dtp_input3"];
    			$tipo_solicitud=$_POST["tipo_solicitud"];
    			$id_investigador=NULL;
    			$id_documento=$_POST["id_documento"];
    			$l_formato=NULL;
    			$l_fec_entrega=NULL;
    			$l_hora_entrega=NULL;
    			$l_fec_devol=NULL;
    			$l_hora_devol=NULL;
    			$d_fec_hora_entrega=NULL;
    			$d_fec_hora_devol=NULL;
    			$c_fec_hora_entrega=NULL;
    			$c_fec_hora_devol=NULL;
    			$e_fec_inicio=$_POST["dtp_expo1"];
    			$e_fec_fin=$_POST["dtp_expo2"];
    			$e_lugar=$_POST["lugarexpo"];
    			$e_motivo=$_POST["motivoexpo"];
    			$v_fec_entrega=NULL;
				$v_fec_devol=NULL;
				$v_hora_entrega=NULL;
				$v_hora_devol=NULL;
    			$v_institucion=NULL;
    			$v_cant_alumnos=NULL;
    		}
    			
    		if ($_POST["tipo_solicitud"]==4){
    			$responsable=$_SESSION["id_usuario"];
    			$solicitante=$_POST["solicita"];
    			$hora_solicitud=$_POST["dtp_input3"];
    			$tipo_solicitud=$_POST["tipo_solicitud"];
    			$id_investigador=NULL;
    			$id_documento=$_POST["id_documento"];
    			$l_formato=NULL;
    			$l_fec_entrega=NULL;
    			$l_hora_entrega=NULL;
    			$l_fec_devol=NULL;
    			$l_hora_devol=NULL;
    			$d_fec_hora_entrega=NULL;
    			$d_fec_hora_devol=NULL;
    			$c_fec_hora_entrega=NULL;
    			$c_fec_hora_devol=NULL;
    			$e_fec_inicio=NULL;
    			$e_fec_fin=NULL;
    			$e_lugar=NULL;
    			$e_motivo=NULL;
    			$v_fec_entrega=$_POST["dtp_visita_fec1"];
				$v_fec_devol=$_POST["dtp_visita_fec2"];
				$v_hora_entrega=$_POST["dtp_visita_hora1"];
				$v_hora_devol=$_POST["dtp_visita_hora2"];
    			$v_institucion=$_POST["institucion"];
    			$v_cant_alumnos=$_POST["alumnos"];
    		}
    	}
    	$solicitud = Solicitud::addSolicitud($responsable,$solicitante,$hora_solicitud,$tipo_solicitud,$id_investigador,$id_documento,
    			$l_formato,$l_fec_devol,$l_fec_entrega,$l_hora_entrega,$l_hora_devol,$d_fec_hora_entrega,$d_fec_hora_devol,
    			$c_fec_hora_entrega,$c_fec_hora_devol,$e_fec_inicio,$e_fec_fin,$e_lugar,$e_fec_fin,$e_lugar,$e_motivo,$v_fec_entrega,
    			$v_fec_devol,$v_hora_entrega,$v_hora_devol,$v_institucion,$v_cant_alumnos);
    	if($solicitud){
    		View::set("mensaje", "<div id=\"mensaje-de-exito\" class=\"alert alert-success\" role=\"alert\" >
        				<strong>Logrado!!</strong> Se ha guardado con exito.
      		  		 </div>");
       		
    		$users = Users::getAll();
    		$docs = Documentos::getAll();
    		$invs = Investigadores::getAll();
    		
    		View::set("users", $users["usuarios"]);
    		View::set("docs", $docs["documentos"]);
    		View::set("invs", $invs["investigador"]);
    		View::render("salida");
    		
    	}else{
    		
    		View::set("mensaje", "<div id=\"mensaje-de-error\"  class=\"alert alert-danger\" role=\"alert\">
                        <strong>Error!</strong> Se ha producido un error. Vuelva a intentarlo, asegurese de completar todos los campos, son obligatorios.<br>
    				    Tenga en cuenta que para Lectura y Visita Guiada la fecha de entrega y devolucion deben ser las mismas.<br>
    				    Las fechas y horas de entrega no pueden ser posteriores a las de devolucion.
                     </div>");
    		
    		$users = Users::getAll();
    		$docs = Documentos::getAll();
    		$invs = Investigadores::getAll();

    		View::set("users", $users["usuarios"]);
    		View::set("docs", $docs["documentos"]);
    		View::set("invs", $invs["investigador"]);
    		View::render("salida");
    		
    	}
    	   	
    }
    public function adddocumento()
    {
    	$seccion=$_POST["seccion"];
    	$volumen=$_POST["volumen"];
    	$numero=$_POST["numero"];
    	if(isset($_POST["ingresodoc"])){$ingresodoc=$_POST["ingresodoc"];}
    	if(isset($_POST["salidadoc"])){$salidadoc=$_POST["salidadoc"];}
    	
    	
        $documento = Documentos::addDocumento($seccion,$volumen,$numero);
    	if($documento){
    		View::set("mensaje", "<div id=\"mensaje-de-exito\" class=\"alert alert-success\" role=\"alert\" >
        				<strong>Logrado!!</strong> Se ha guardado con exito.
      		  		 </div>");
       		
    		$users = Users::getAll();
    		$docs = Documentos::getAll();
    		$invs = Investigadores::getAll();
    		
    		View::set("users", $users["usuarios"]);
    		View::set("docs", $docs["documentos"]);
    		View::set("invs", $invs["investigador"]);
    		if(isset($ingresodoc) and ($ingresodoc==="ingresodoc")){View::render("ingreso");}
    		if(isset($salidadoc) and ($salidadoc==="salidadoc")){View::render("salida");}
    		
    		
    	}else{
    		
    		View::set("mensaje", "<div id=\"mensaje-de-error\"  class=\"alert alert-danger\" role=\"alert\">
                        <strong>Error!</strong> Se ha producido un error. Vuelva a intentarlo. Asegurece de completar el campo de volumen obligatorio y que el par volumen y numero es unico por seccion
                     </div>");
    		
    		$users = Users::getAll();
    		$docs = Documentos::getAll();
    		$invs = Investigadores::getAll();

    		View::set("users", $users["usuarios"]);
    		View::set("docs", $docs["documentos"]);
    		View::set("invs", $invs["investigador"]);
    	    if(isset($ingresodoc) and ($ingresodoc==="ingresodoc")){View::render("ingreso");}
    		if(isset($salidadoc) and ($salidadoc==="salidadoc")){View::render("salida");}
    		
    	}
    	 
    }
    
    public function addinvestigador()
    {
    
    	$nombre=$_POST["nombre"];
    	$apellido=$_POST["apellido"];
    	$ci=$_POST["ci"];
    	$nacionalidad=$_POST["nacionalidad"];
    	$direccion=$_POST["direccion"];
    	$email=$_POST["email"];
    	$telefono=$_POST["telefono"];
    	$tema=$_POST["tema"];
    	
    	$investigador = Investigadores::addInvestigador($nombre,$apellido,$ci,$nacionalidad,$direccion,$email,$telefono,$tema);
    	if($investigador){
    		View::set("mensaje", "<div id=\"mensaje-de-exito\" class=\"alert alert-success\" role=\"alert\" >
        				<strong>Logrado!!</strong> Se ha guardado con exito.
      		  		 </div>");
    		 
    		$users = Users::getAll();
    		$docs = Documentos::getAll();
    		$invs = Investigadores::getAll();
    
    		View::set("users", $users["usuarios"]);
    		View::set("docs", $docs["documentos"]);
    		View::set("invs", $invs["investigador"]);
    		View::render("salida");
    
    	}else{
    
    		View::set("mensaje", "<div id=\"mensaje-de-error\"  class=\"alert alert-danger\" role=\"alert\">
                        <strong>Error!</strong> Se ha producido un error. Vuelva a intentarlo. Asegurece de completar todos los campos de Investigador y que el mismo no exista aun.
                     </div>");
    
    		$users = Users::getAll();
    		$docs = Documentos::getAll();
    		$invs = Investigadores::getAll();
    
    		View::set("users", $users["usuarios"]);
    		View::set("docs", $docs["documentos"]);
    		View::set("invs", $invs["investigador"]);
    		View::render("salida");
    
    	}
    
    }
    public function addingreso()
    {
    	$id_documento=$_POST["id_documento"];
    	$registro=$_POST["registro"];
    	$anio=$_POST["anio"];
    	$pagina=$_POST["pagina"];
    	
    	
    	$documento = Documentos::addIngresoDoc($id_documento,$registro,$anio,$pagina);
    	if($documento){
    		View::set("mensaje", "<div id=\"mensaje-de-exito\" class=\"alert alert-success\" role=\"alert\" >
        				<strong>Logrado!!</strong> Se ha guardado con exito.
      		  		 </div>");
    		 
    		$users = Users::getAll();
    		$docs = Documentos::getAll();
    		//$invs = Investigadores::getAll();
    
    		View::set("users", $users["usuarios"]);
    		View::set("docs", $docs["documentos"]);
    		//View::set("invs", $invs["investigador"]);
    		View::render("ingreso");
    
    	}else{
    
    		View::set("mensaje", "<div id=\"mensaje-de-error\"  class=\"alert alert-danger\" role=\"alert\">
                        <strong>Error!</strong> Se ha producido un error. Vuelva a intentarlo. Asegurece de completar todos los campos.
    				   Y que el registro no exista.
                     </div>");
    
    		$users = Users::getAll();
    		$docs = Documentos::getAll();
    		//$invs = Investigadores::getAll();
    
    		View::set("users", $users["usuarios"]);
    		View::set("docs", $docs["documentos"]);
    		//View::set("invs", $invs["investigador"]);
    		View::render("ingreso");
    
    	}
    
    }
    
}
