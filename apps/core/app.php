<?php

/**
 * 
 */
class App 
{
	protected $controller = 'Blogs';
	protected $method = 'create';
	protected $params = [];
	function __construct()
	{
        $url = $this->parseUrl();
        // checking whether the controller exists or not        
        if(file_exists('../apps/controllers/'.$url[0].'controller.php')){
              $this->controller = $url[0];
              unset($url[0]);
        }

        require_once'../apps/controllers/'.$this->controller.'controller.php';
        $className = ucfirst($this->controller). 'Controller';
        $this->controller = new $className;

//checking whether the method exists on that controller
        if (isset($url[1])) {
	        if (method_exists($this->controller,$url[1])) {
	        	$this->method = $url[1];
	        	unset($url[1]);
            }
        }

        $this->params = $url?array_values($url):[];
        call_user_func_array([$this->controller,$this->method],$this->params);	
    }
    
	function parseUrl(){
		if (isset($_GET['url'])) {
			// echo $_GET['url'];
			return explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
		}
	}
}