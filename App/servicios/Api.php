<?php  
 require_once("Rest.php");  
 class Api extends Rest {  
   const servidor = "localhost";  
   const usuario_db = "postgres";  
   const pwd_db = "postgres";  
   const nombre_db = "archivo";  
   const port_db=5432;
   private $_conn = NULL;  
   private $_metodo;  
   private $_argumentos;  
   public function __construct() {  
     parent::__construct();  
     $this->conectarDB();  
   }  
   private function conectarDB() {  //"pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$pass"
     $dsn = 'pgsql:dbname=' . self::nombre_db . ';host=' . self::servidor . ';port='. self::port_db;
	// echo $dsn;exit;
     try {  
       $this->_conn = new PDO($dsn, self::usuario_db, self::pwd_db);  
     } catch (PDOException $e) {  
       echo 'Falló la conexión: ' . $e->getMessage();  
     }  
   }  
   private function devolverError($id) {  
     $errores = array(  
       array('estado' => "error", "msg" => "petición no encontrada"),  
       array('estado' => "error", "msg" => "petición no aceptada"),  
       array('estado' => "error", "msg" => "petición sin contenido"),  
       array('estado' => "error", "msg" => "email o password incorrectos"),  
       array('estado' => "error", "msg" => "error borrando usuario"),  
       array('estado' => "error", "msg" => "error actualizando nombre de usuario"),  
       array('estado' => "error", "msg" => "error buscando usuario por email"),  
       array('estado' => "error", "msg" => "error creando "),  
       array('estado' => "error", "msg" => "usuario ya existe")  
     );  
     return $errores[$id];  
   }  
   public function procesarLLamada() {  
     if (isset($_REQUEST['url'])) {  
       //si por ejemplo pasamos explode('/','////controller///method////args///') el resultado es un array con elem vacios;
       //Array ( [0] => [1] => [2] => [3] => [4] => controller [5] => [6] => [7] => method [8] => [9] => [10] => [11] => args [12] => [13] => [14] => )
       $url = explode('/', trim($_REQUEST['url']));  
       //con array_filter() filtramos elementos de un array pasando función callback, que es opcional.
       //si no le pasamos función callback, los elementos false o vacios del array serán borrados 
       //por lo tanto la entre la anterior función (explode) y esta eliminamos los '/' sobrantes de la URL
       $url = array_filter($url);  
       $this->_metodo = strtolower(array_shift($url));  
       $this->_argumentos = $url;  
       $func = $this->_metodo;  
       if ((int) method_exists($this, $func) > 0) {  
         if (count($this->_argumentos) > 0) {  
           call_user_func_array(array($this, $this->_metodo), $this->_argumentos);  
         } else {//si no lo llamamos sin argumentos, al metodo del controlador  
           call_user_func(array($this, $this->_metodo));  
         }  
       }  
       else  
         $this->mostrarRespuesta($this->convertirJson($this->devolverError(0)), 404);  
     }  
     $this->mostrarRespuesta($this->convertirJson($this->devolverError(0)), 404);  
   }  
   private function convertirJson($data) {  
     return json_encode($data);  
   }  
   
   private function usuarios() {  
     if ($_SERVER['REQUEST_METHOD'] != "GET") {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }  
     $query = $this->_conn->query("SELECT * FROM usuarios");  
     $filas = $query->fetchAll(PDO::FETCH_ASSOC);  
     $num = count($filas);  
     if ($num > 0) {  
       $respuesta['estado'] = 'correcto';  
       $respuesta['usuarios'] = $filas;  
       $this->mostrarRespuesta($this->convertirJson($respuesta), 200);  
     }  
     $this->mostrarRespuesta($this->devolverError(2), 204);  
   }  
    
   private function login() {  
     if ($_SERVER['REQUEST_METHOD'] != "POST") {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }
   
	 if (isset($_POST['username'], $_POST['password'])) {  

	   $username = $_POST['username'];
	   $pwd = $_POST['password']; 
	   $pwdmd5=md5($pwd);
	 // $username ="jperez";
	 //  $pwd=md5('1234');
       if (!empty($username) and !empty($pwd)) {  
       
           $query = $this->_conn->prepare("SELECT id_usuario, nombres,ci, email, apellidos,username FROM usuarios WHERE username='$username' AND password='$pwdmd5'");  
		//echo $query;exit;
           //$query->bindValue(":username", $username);  
          // $query->bindValue(":pwd", $pwdmd5);  
		   
		   $query->execute();
		
           if ($fila = $query->fetch(PDO::FETCH_ASSOC)) {  
             $respuesta['estado'] = 'correcto';  
             $respuesta['msg'] = 'datos pertenecen a usuario registrado';  
             $respuesta['usuario']['id_usuario'] = $fila['id_usuario'];  
             $respuesta['usuario']['nombres'] = $fila['nombres'];
             $respuesta['usuario']['apellidos'] = $fila['apellidos'];
             $respuesta['usuario']['email'] = $fila['email'];  
             $respuesta['usuario']['username'] = $fila['username'];
			  $respuesta['usuario']['ci'] = $fila['ci'];
             $this->mostrarRespuesta($this->convertirJson($respuesta), 200);  
           }  
         
       }  
     }  
     $this->mostrarRespuesta($this->convertirJson($this->devolverError(3)), 400);  
   }  
     
   private function actualizarNombre($idUsuario) {  
     if ($_SERVER['REQUEST_METHOD'] != "PUT") {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }  
     //echo $idUsuario . "<br/>";  
     if (isset($this->datosPeticion['nombres'])) {  
       $nombre = $this->datosPeticion['nombres'];  
       $id = (int) $idUsuario;  
       if (!empty($nombre) and $id > 0) {  
         $query = $this->_conn->prepare("update usuarios set nombres=:nombres WHERE id_usuario =:id_usuario");  
         $query->bindValue(":nombres", $nombres);  
         $query->bindValue(":id_usuario", $id_usuario);  
         $query->execute();  
         $filasActualizadas = $query->rowCount();  
         if ($filasActualizadas == 1) {  
           $resp = array('estado' => "correcto", "msg" => "nombre de usuario actualizado correctamente.");  
           $this->mostrarRespuesta($this->convertirJson($resp), 200);  
         } else {  
           $this->mostrarRespuesta($this->convertirJson($this->devolverError(5)), 400);  
         }  
       }  
     }  
     $this->mostrarRespuesta($this->convertirJson($this->devolverError(5)), 400);  
   }  
     
   private function borrarUsuario($idUsuario) {  
     if ($_SERVER['REQUEST_METHOD'] != "DELETE") {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }  
     $id = (int) $idUsuario;  
     if ($id >= 0) {  
       $query = $this->_conn->prepare("delete from usuarios WHERE id_usuario =:id_usuario");  
       $query->bindValue(":id_usuario", $id_usuario);  
       $query->execute();  
       //rowcount para insert, delete. update  
       $filasBorradas = $query->rowCount();  
       if ($filasBorradas == 1) {  
         $resp = array('estado' => "correcto", "msg" => "usuario borrado correctamente.");  
         $this->mostrarRespuesta($this->convertirJson($resp), 200);  
       } else {  
         $this->mostrarRespuesta($this->convertirJson($this->devolverError(4)), 400);  
       }  
     }  
     $this->mostrarRespuesta($this->convertirJson($this->devolverError(4)), 400);  
   }  
   private function existeUsuario($username) {  
     //if (filter_var($email, FILTER_VALIDATE_EMAIL)) {  
       $query = $this->_conn->prepare("SELECT username from usuarios WHERE username = :username");  
       $query->bindValue(":username", $username);  
       $query->execute();  
       if ($query->fetch(PDO::FETCH_ASSOC)) {  
         return true;  
       }  
     /*}  
     else  
       return false;  */
   }  
     
   private function crearUsuario() {  
     if ($_SERVER['REQUEST_METHOD'] != "POST") {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }  
     if (isset($this->datosPeticion['nombre'], $this->datosPeticion['email'], $this->datosPeticion['pwd'])) {  
       $nombre = $this->datosPeticion['nombre'];  
       $pwd = $this->datosPeticion['pwd'];  
       $email = $this->datosPeticion['email'];  
       if (!$this->existeUsuario($email)) {  
         $query = $this->_conn->prepare("INSERT into usuario (nombre,email,password,fRegistro) VALUES (:nombre, :email, :pwd, NOW())");  
         $query->bindValue(":nombre", $nombre);  
         $query->bindValue(":email", $email);  
         $query->bindValue(":pwd", sha1($pwd));  
         $query->execute();  
         if ($query->rowCount() == 1) {  
           $id = $this->_conn->lastInsertId();  
           $respuesta['estado'] = 'correcto';  
           $respuesta['msg'] = 'usuario creado correctamente';  
           $respuesta['usuario']['id'] = $id;  
           $respuesta['usuario']['nombre'] = $nombre;  
           $respuesta['usuario']['email'] = $email;  
           $this->mostrarRespuesta($this->convertirJson($respuesta), 200);  
         }  
         else  
           $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);  
       }  
       else  
         $this->mostrarRespuesta($this->convertirJson($this->devolverError(8)), 400);  
     } else {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);  
     }  
   }  
   /*** Investigadores***/
    private function investigadores() {  
     if ($_SERVER['REQUEST_METHOD'] != "GET") {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }  
     $query = $this->_conn->query("SELECT id_investigador, nombres, apellidos FROM investigador");  
     $filas = $query->fetchAll(PDO::FETCH_ASSOC);  
     $num = count($filas);  
     if ($num > 0) {  
       $respuesta['estado'] = 'correcto';  
       $respuesta['investigador'] = $filas;  
       $this->mostrarRespuesta($this->convertirJson($respuesta), 200);  
     }  
     $this->mostrarRespuesta($this->devolverError(2), 204);  
   }  
   
   
   private function addInvestigador() {  
     if ($_SERVER['REQUEST_METHOD'] != "POST") {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }  
     if (isset($this->datosPeticion['nombres'], $this->datosPeticion['apellidos'], $this->datosPeticion['ci'])) {  
       $nombres = $this->datosPeticion['nombres'];  
       $apellidos = $this->datosPeticion['apellidos']; 
	   $ci = $this->datosPeticion['ci'];  
       $email = $this->datosPeticion['email'];  	   
       $nacionalidad = $this->datosPeticion['nacionalidad'];  
	   $tema = $this->datosPeticion['tema']; 
       if (!$this->existeInvestigador($ci)) {  
         $query = $this->_conn->prepare("INSERT into investigador (nombres,apellidos,ci,email,nacionalidad,tema) VALUES (:nombres,:apellidos,:ci,:email, :nacionalidad,:tema)");  
         $query->bindValue(":nombres", $nombres);  
         $query->bindValue(":apellidos", $apellidos);  
         $query->bindValue(":ci", $ci);  
		 $query->bindValue(":email",$email);  
		 $query->bindValue(":nacionalidad", $nacionalidad);  
		 $query->bindValue(":tema", $tema);  
         $query->execute();  
         if ($query->rowCount() == 1) {  
           $id = $this->_conn->lastInsertId();  
           $respuesta['estado'] = 'correcto';  
           $respuesta['msg'] = 'c creado correctamente';  
           //$respuesta['investigador']['id_investigador'] = $id;  
           $respuesta['investigador']['nombres'] = $nombres;  
           $respuesta['investigador']['apellidos'] = $apellidos;  		  
		   $respuesta['investigador']['ci'] = $ci;  
		   $respuesta['investigador']['email'] = $email;  
		   $respuesta['investigador']['nacionalidad'] = $nacionalidad; 
           $respuesta['investigador']['tema'] = $tema;  		   
           $this->mostrarRespuesta($this->convertirJson($respuesta), 200);  
         }  
         else  
           $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);  
       }  
       else  
         $this->mostrarRespuesta($this->convertirJson($this->devolverError(8)), 400);  
     } else {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);  
     }  
   } 

	private function existeInvestigador($ci) {  
     
       $query = $this->_conn->prepare("SELECT ci from investigador WHERE ci = :ci");  
       $query->bindValue(":ci", $ci);  
       $query->execute();  
       if ($query->fetch(PDO::FETCH_ASSOC)) {  
         return true;  
       } else{ return false;} 
     
   }     
   /***Fin Investigadores****/
   
   /****Documentos**/
    private function documentos() {  
     if ($_SERVER['REQUEST_METHOD'] != "GET") {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }  
     $query = $this->_conn->query("SELECT id_documento, seccion, volumen,numero FROM documentos");  
     $filas = $query->fetchAll(PDO::FETCH_ASSOC);  
     $num = count($filas);  
     if ($num > 0) {  
       $respuesta['estado'] = 'correcto';  
       $respuesta['documentos'] = $filas;  
       $this->mostrarRespuesta($this->convertirJson($respuesta), 200);  
     }  
     $this->mostrarRespuesta($this->devolverError(2), 204);  
   }  
   
   
   private function addDocumento() {  
     if ($_SERVER['REQUEST_METHOD'] != "POST") {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }  
     if (isset($this->datosPeticion['seccion'], $this->datosPeticion['volumen'], $this->datosPeticion['numero'])) {  
       $seccion = $this->datosPeticion['seccion'];  
       $volumen = $this->datosPeticion['volumen']; 
	   $numero = $this->datosPeticion['numero'];  
      
       if (!$this->existedocumento($numero,$seccion,$volumen)) {  
         $query = $this->_conn->prepare("INSERT into documentos (seccion,volumen,numero) VALUES (:seccion,:volumen,:numero)");  
         $query->bindValue(":seccion", $seccion);  
         $query->bindValue(":volumen", $volumen);  
         $query->bindValue(":numero", $numero);
		 $query->execute();  
         if ($query->rowCount() == 1) {  
           //$id = $this->_conn->lastInsertId();  
           $respuesta['estado'] = 'correcto';  
           $respuesta['msg'] = 'c creado correctamente';  
           //$respuesta['documento']['id_documento'] = $id;  
           $respuesta['documento']['seccion'] = $seccion;  
           $respuesta['documento']['volumen'] = $volumen;  		  
		   $respuesta['documento']['numero'] = $numero;  
		      
           $this->mostrarRespuesta($this->convertirJson($respuesta), 200);  
         }  
         else  
           $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);  
       }  
       else  
         $this->mostrarRespuesta($this->convertirJson($this->devolverError(8)), 400);  
     } else {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);  
     }  
   } 

	private function existeDocumento($numero,$seccion,$volumen) {  
     
       $query = $this->_conn->prepare("SELECT numero from documentos WHERE numero= :numero AND seccion= :seccion AND volumen= :volumen");  
       $query->bindValue(":numero", $numero);  
	   $query->bindValue(":seccion", $seccion);  
	   $query->bindValue(":volumen", $volumen);
       $query->execute();  
       if ($query->fetch(PDO::FETCH_ASSOC)) {  
         return true;  
       } else{ return false;} 
     
   }     
   /***Fin Documentos**/
   /**Ingreso Documento**/
 private function IngresoDoc() {  
     if ($_SERVER['REQUEST_METHOD'] != "POST") {  
     	
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }

     if (isset($this->datosPeticion['id_documento'], $this->datosPeticion['registro'], $this->datosPeticion['anio'], $this->datosPeticion['pagina'])) {  
       $id_documento = $this->datosPeticion['id_documento'];  
       $registro = $this->datosPeticion['registro']; 
	   $anio = $this->datosPeticion['anio'];  
	   $pagina = $this->datosPeticion['pagina'];  
     
       if (!$this->existeIngreso($id_documento)) {  
         $query = $this->_conn->prepare("INSERT into doc_ingreso (id_documento,registro,anio,pagina) VALUES (:id_documento,:registro,:anio,:pagina)");  
         $query->bindValue(":id_documento", $id_documento);  
         $query->bindValue(":registro", $registro);  
         $query->bindValue(":anio", $anio);
		 $query->bindValue(":pagina", $pagina);
		 $query->execute();  
		 //print_r($query);
         if ($query->rowCount() == 1) {  
           //$id = $this->_conn->lastInsertId();  
           $respuesta['estado'] = 'correcto';  
           $respuesta['msg'] = 'c creado correctamente';  
           $respuesta['doc_ingreso']['id_documento'] = $id_documento;  
           $respuesta['doc_ingreso']['registro'] = $registro;  
           $respuesta['doc_ingreso']['anio'] = $anio;  		  
		   $respuesta['doc_ingreso']['pagina'] = $pagina;  
		      
           $this->mostrarRespuesta($this->convertirJson($respuesta), 200);  
         }  
         else  
           $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);  
       }  
       else  
         $this->mostrarRespuesta($this->convertirJson($this->devolverError(8)), 400);  
     } else {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);  
     }  
   }   
   private function existeIngreso($id_documento) {  
     
       $query = $this->_conn->prepare("SELECT id_documento from doc_ingreso WHERE id_documento= :id_documento");  
       $query->bindValue(":id_documento", $id_documento);  
	 
       $query->execute();  
       if ($query->fetch(PDO::FETCH_ASSOC)) {  
         return true;  
       } else{ return false;} 
     
   }     
   /**Fin**/
   /***Solicitud de Salida**/
   private function addSolicitud() {  
     if ($_SERVER['REQUEST_METHOD'] != "POST") {
     	echo "hola";
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(1)), 405);  
     }  
     if (isset($this->datosPeticion['responsable'], $this->datosPeticion['solicitante'])) {  
       $responsable = $this->datosPeticion['responsable'];  
       $solicitante = $this->datosPeticion['solicitante'];  
       $fec_hora_solicitud = $this->datosPeticion['fec_hora_solicitud'];  
	   $tipo_solicitud = $this->datosPeticion['tipo_solicitud'];
	   $id_investigador = $this->datosPeticion['id_investigador'];
	   $id_documento = $this->datosPeticion['id_documento'];
	   $l_formato = $this->datosPeticion['l_formato'];
	   $l_fec_entrega = $this->datosPeticion['l_fec_entrega'];
	   $l_hora_entrega = $this->datosPeticion['l_hora_entrega'];
	   $l_fec_devol = $this->datosPeticion['l_fec_devol'];
	   $l_hora_devol = $this->datosPeticion['l_hora_devol'];
	   $d_fec_hora_entrega = $this->datosPeticion['d_fec_hora_entrega'];
	   $d_fec_hora_devol = $this->datosPeticion['d_fec_hora_devol'];
	   $c_fec_hora_entrega = $this->datosPeticion['c_fec_hora_entrega'];
	   $c_fec_hora_devol = $this->datosPeticion['c_fec_hora_devol'];
	   $e_fec_inicio = $this->datosPeticion['e_fec_inicio'];
	   $e_fec_fin = $this->datosPeticion['e_fec_fin'];
	   $e_lugar = $this->datosPeticion['e_lugar'];
	   $e_motivo = $this->datosPeticion['e_motivo'];
	   $v_fec_hora_entrega = $this->datosPeticion['v_fec_hora_entrega'];
	   $v_fec_hora_devol = $this->datosPeticion['v_fec_hora_devol'];
	   $v_institucion = $this->datosPeticion['v_institucion'];
	   $v_cant_alumnos = $this->datosPeticion['v_cant_alumnos'];
       //if (!$this->existeUsuario($email)) {  
         $query = $this->_conn->prepare("INSERT INTO solicitud_salida(
            responsable, solicitante, tipo_solicitud, id_investigador, 
            id_documento, l_formato, l_fec_entrega, l_hora_entrega, l_fec_devol, 
            l_hora_devol, d_fec_hora_entrega, d_fec_hora_devol, c_fec_hora_entrega, 
            c_fec_hora_devol, e_fec_inicio, e_fec_fin, e_lugar, e_motivo, 
            v_fec_hora_entrega, v_fec_hora_devol, v_institucion, v_cant_alumnos,fec_hora_solicitud)
    VALUES (:responsable, :solicitante, :tipo_solicitud, :id_investigador, 
            :id_documento, :l_formato,:l_fec_entrega, :l_hora_entrega, :l_fec_devol, 
            :l_hora_devol, :d_fec_hora_entrega, :d_fec_hora_devol, :c_fec_hora_entrega, 
            :c_fec_hora_devol, :e_fec_inicio, :e_fec_fin, :e_lugar, :e_motivo, 
            :v_fec_hora_entrega, :v_fec_hora_devol, :v_institucion, :v_cant_alumnos)");  
         $query->bindValue(":responsable", $responsable);  
         $query->bindValue(":solicitante", $solicitante);  
         $query->bindValue(":tipo_solicitud", $tipo_solicitud); 
		 $query->bindValue(":id_investigador", $id_investigador); 
		 $query->bindValue(":id_documento", $id_documento); 
		 $query->bindValue(":l_formato", $l_formato); 
		 $query->bindValue(":l_fec_entrega", $l_fec_entrega); 
		 $query->bindValue(":l_hora_entrega", $l_hora_entrega); 
		 $query->bindValue(":l_fec_devol", $l_fec_devol); 
		 $query->bindValue(":l_hora_devol", $l_hora_devol); 
		 $query->bindValue(":e_fec_inicio", $e_fec_inicio); 
		 $query->bindValue(":e_fec_fin", $e_fec_fin); 
		 $query->bindValue(":e_lugar", $e_lugar);
		 $query->bindValue(":e_motivo", $e_motivo); 
		 $query->bindValue(":v_fec_hora_entrega",$v_fec_hora_entrega); 
		 $query->bindValue(":v_fec_hora_devol", $v_fec_hora_devol); 
		 $query->bindValue(":v_institucion", $v_institucion);
		 $query->bindValue(":v_cant_alumnos", $v_cant_alumnos);  
		 $query->bindValue(":fec_hora_solicitud", $fec_hora_solicitud);  
		  $query->bindValue(":d_fec_hora_entrega", $d_fec_hora_entrega);
		   $query->bindValue(":d_fec_hora_devol", $d_fec_hora_entrega);
		   $query->bindValue(":c_fec_hora_entrega", $c_fec_hora_entrega);
		   $query->bindValue(":c_fec_hora_devol", $c_fec_hora_devol);
		 
		$stmt="INSERT INTO solicitud_salida(
            responsable, solicitante, tipo_solicitud, id_investigador, 
            id_documento, l_formato, l_fec_entrega, l_hora_entrega, l_fec_devol, 
            l_hora_devol, d_fec_hora_entrega, d_fec_hora_devol, c_fec_hora_entrega, 
            c_fec_hora_devol, e_fec_inicio, e_fec_fin, e_lugar, e_motivo, 
            v_fec_hora_entrega, v_fec_hora_devol, v_institucion, v_cant_alumnos,fec_hora_solicitud)
    VALUES ($responsable, $solicitante,$tipo_solicitud, $id_investigador, 
            $id_documento, $l_formato,$l_fec_entrega, $l_hora_entrega, $l_fec_devol, 
            $l_hora_devol, $d_fec_hora_entrega, $d_fec_hora_devol,$c_fec_hora_entrega, 
            $c_fec_hora_devol, $e_fec_inicio, $e_fec_fin, $e_lugar, $e_motivo, 
            $v_fec_hora_entrega, $v_fec_hora_devol,$v_institucion, $v_cant_alumnos,$fec_hora_solicitud)";
		print_r($stmt);exit;
         $query->execute();  
         if ($query->rowCount() == 1) {  
          // $id = $this->_conn->lastInsertId();  
           $respuesta['estado'] = 'correcto';  
           $respuesta['msg'] = 'solicitud creado correctamente';  
           //$respuesta['usuario']['id'] = $id;  
           $respuesta['solicitud_salida']['responsable'] = $responsable;  
           $respuesta['solicitud_salida']['solicitante'] = $solicitante; 
		   
           $this->mostrarRespuesta($this->convertirJson($respuesta), 200);  
         }  
         else  
           $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);  
      /* }  
       else  
         $this->mostrarRespuesta($this->convertirJson($this->devolverError(8)), 400);  */
     } else {  
       $this->mostrarRespuesta($this->convertirJson($this->devolverError(7)), 400);  
     }  
   }
   
   /**FIN**/
 }  
 $api = new Api();  
 $api->procesarLLamada();  
