<?php
require_once("baseDeDatos.class.php");
class consulta
{
        //elemento de conexion
 	private $conexion;
        //conteo de filas
        private $filas;
        
        //CONSTRUCTORES Y DESTRUCTORES
        public function __construct()
	{
		$this->conexion = new baseDeDatos();
	}
        public function __destruct()
	{
                $this->conexion = null;
	}
        
        public function consulta($consulta,$parametros,&$resultado){
            try{
                //abrimos la conexion
                $datos = $this->conexion->prepare($consulta);
                //ejecutamos la consulta haciendo binding de los parametros
                if (!$datos->execute($parametros)){
                    return false;
                }
                //devolvemos un array asociativo
                $resultado = $datos->fetchall(PDO::FETCH_ASSOC);
                //cargamos el ultimo rowcount
                $this->filas = $datos->rowCount();            
                return true;
            }
            catch(PDOException $e) {
                if ($debug) {
                    echo $e->getMessage();
                }
                return false;
            }  
        }
        
        public function getFilas() {
            return $this->filas;
        }
}	


