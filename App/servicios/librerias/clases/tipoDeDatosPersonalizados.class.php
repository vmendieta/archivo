<?php
require_once 'expresionesRegulares.class.php';

//entero, texto, email, fecha, hora
class tipoEntero {
    var $entero;
    public function set($valor){$this->entero = $valor;}
    public  function get() {return $this->entero;}
    public function validar() {if (filter_var($this->entero, FILTER_VALIDATE_INT) === 0 || !filter_var($this->entero, FILTER_VALIDATE_INT) === false) {
    return true;
} else {
    return false;
}}
    public function sanear() {return filter_var($this->entero,FILTER_SANITIZE_NUMBER_INT);}
}

class tipoTexto {
    var $texto;
    public function set($valor){$this->texto = $valor;}
    public  function get() {return $this->texto;}
    public function validar() {return true;}
    public function sanear() {return filter_var($this->texto, FILTER_SANITIZE_STRING);}
}

class tipoEmail {
    var $email;
    public function set($valor){$this->email = $valor;}
    public  function get() {return $this->email;}
    public function validar() {return filter_var($this->email, FILTER_VALIDATE_EMAIL);}
    public function sanear() {return filter_var($this->email, FILTER_SANITIZE_EMAIL);}
}

class tipoBoolean {
    var $boolean;
    public function set($valor){$this->boolean = $valor;}
    public  function get() {return $this->boolean;}
    public function validar() {if ($this->boolean==true or $this->boolean==false) {return true;} else {return false;}}
    public function sanear() {if ($this->boolean==true) {return 'true';} else {return 'false';}}
}



