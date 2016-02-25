<?php
class expresionesRegulares {
    public static function evaluarHora($hora) {
        return preg_match( '/[0-9]{2}\:[0-9]{2}/is', $hora);
    }
    public static function evaluarFecha($fecha) {
        return preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $fecha);
    }
    
}
