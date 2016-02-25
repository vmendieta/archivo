<?php
//directorio del proyecto
define("PROJECTPATH", dirname(__DIR__));

//directorio app
define("APPPATH", PROJECTPATH . '/App');

//site address
define('DIR','http://localhost/');

session_start();


//autoload con namespaces

function autoload_classes($class_name)
{
    $filename = PROJECTPATH . '/' . str_replace('\\', '/', $class_name) .'.php';
    if(is_file($filename))
    {
        include_once $filename;
    }
}
//registramos el autoload autoload_classes
spl_autoload_register('autoload_classes');

//instancia de la app
$app = new \Core\App;

//lanzamos la app
$app->render();
