<?php
require_once 'expresionesRegulares.class.php';
require_once 'tipoDeDatosPersonalizados.class.php';

class validar{
    
    //VALIDAR GENERALES
    //email
    public static function  validarEmail(&$email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    //entero
    public static function  validarEntero(&$entero) {
        return filter_var($entero, FILTER_VALIDATE_INT);
    }
    //contrasena
    public static function  validarContrasena(&$entero) {
        return true;
    }
    
    //verifica y sanea los datos del arreglo para el insert
    
    //CONTROLADOR: insertar
    //validar datos del json
    public static function validarDatosInsertar($datos,$datosCampos) {

        
        $datosSaneados = array();
        
        //verifico que en datos existan las entradas en datosCampos
        foreach ($datosCampos as $key => $valor) {
            if (!array_key_exists($key, $datos)) {
                return null;
            }
        }
        
        //verifico los tipos de datos y cargo el array saneado
        foreach ($datosCampos as $key => $objeto) {
            $objeto->set($datos[$key]);
            if ($objeto->validar()==false){
                //var_dump($objeto);
                return null;
            }
            array_push($datosSaneados,$objeto->sanear());
        }
        
        //retornamos true
        return $datosSaneados;
    }
    
    
    
    //CONTROLADOR: login
        public static function validarJsonLogin($json) {
        //verificamos que el json no sea null
        if ($json == null) {return null;}
        //verificamos que efectivamente sea un array
        if (!is_array($json)) {return null;}
        //verificamos que exista email
        if (!array_key_exists('email',$json)) {return false;}
        //verificamos que exista contrasena
        if (!array_key_exists('contrasena',$json)) {return false;}
        //verificamos que email sea valido
        if (validar::validarEmail($json['email'])==false) {return false;}
        //verificamos que contrasena sea valida
        if (validar::validarContrasena($json['contrasena'])==false) {return false;}
        return true;
    }

    
}


