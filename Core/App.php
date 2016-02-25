<?php
namespace Core;
defined("APPPATH") OR die("Access denied");

class App
{
    /**
    * @var
    */
    private $_controller;

    /**
    * @var
    */
    private $_method = "index";

    /**
    * @var
    */
    private $_params = [];

    /**
     * [$config description]
     * @var [type]
     */
    public $config = [];

    /**
    * @var
    */
    const NAMESPACE_CONTROLLERS = "\App\Controllers\\";

    /**
     * @var
     */
    const CONTROLLERS_PATH = "../App/controllers/";
    const CONTROLLERS_PATH_HOME = "../App/controllers/home";
    

    /**
     * [__construct description]
     */
    public function __construct()
    {
        //obtenemos la url parseada
        $url = $this->parseUrl();
      // print_r($url) ; //exit;
        //comprobamos que exista el archivo en el directorio controllers
        if(file_exists(self::CONTROLLERS_PATH.ucfirst($url[0]) . ".php"))
        {
            //nombre del archivo a llamar
            $this->_controller = ucfirst($url[0]);
            //eliminamos el controlador de url, así sólo nos quedaran los parámetros del método
            unset($url[0]);
        }
        else
        { 
        	if ((sizeof($url)==1)) {
        		
        		$this->_controller = "home";
        		$url[1]=$url[0];        		
        	} else{
        		
        		include APPPATH . "/views/errors/404.php";
        		exit;
        		
        	}
            //include APPPATH . "/views/errors/404.php";
           /* print_r($url);
            print_r(__DIR__);
            print_r(__FILE__);*/
        	//echo sizeof($url) ;
           // exit;
        }

        //obtenemos la clase con su espacio de nombres
        $fullClass = self::NAMESPACE_CONTROLLERS.$this->_controller;
       // print_r($fullClass);print_r($url);exit;
        //asociamos la instancia a $this->_controller
        $this->_controller = new $fullClass;

        //si existe el segundo segmento comprobamos que el método exista en esa clase
        if(isset($url[1]))
        {

            //aquí tenemos el método
            $this->_method = $url[1];
            if(method_exists($this->_controller, $url[1]))
            {
                //eliminamos el método de url, así sólo nos quedaran los parámetros del método
                unset($url[1]);
            }
            else
            { 
            /*if(($url[0]=$url[1])&&($url[1]="home")){
            	//echo "hola";exit;
            	$url[1]=$url[2];
            	$this->_method = $url[1];
            	if(method_exists($this->_controller, $url[1])){
                //eliminamos el método de url, así sólo nos quedaran los parámetros del método
                unset($url[1]);
           		 }
            	else{
            		throw new \Exception("Error Processing Method {$this->_method}", 1);
                 }
            }else{*/
            		throw new \Exception("Error Processing Method {$this->_method}", 1);
           // }
                
            }
        }
        //asociamos el resto de segmentos a $this->_params para pasarlos al método llamado, por defecto será un array vacío
        $this->_params = $url ? array_values($url) : [];
    }

    /**
     * [parseUrl Parseamos la url en trozos]
     * @return [type] [description]
     */
    public function parseUrl()
    {
        if(isset($_GET["url"]))
        {
            return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
        }
    }

    /**
     * [render  lanzamos el controlador/método que se ha llamado con los parámetros]
     */
    public function render()
    {
        call_user_func_array([$this->_controller, $this->_method], $this->_params);
    }

    /**
     * [getConfig Obtenemos la configuración de la app]
     * @return [Array] [Array con la config]
     */
    public static function getConfig()
    {
        return parse_ini_file(APPPATH . '/config/config.ini');
    }

    /**
     * [getController Devolvemos el controlador actual]
     * @return [type] [String]
     */
    public function getController()
    {
        return $this->_controller;
    }

    /**
     * [getMethod Devolvemos el método actual]
     * @return [type] [String]
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * [getParams description]
     * @return [type] [Array]
     */
    public function getParams()
    {
        return $this->_params;
    }
}
