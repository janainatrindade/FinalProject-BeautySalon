<?php
// code from https://www.youtube.com/watch?v=q0JhJBYi4sw - Tutorial of MVC

class App
{
	private $controller = 'Home';
	private $method 	= 'index';

	private function splitURL()
	{
		$URL = $_GET['url'] ?? 'home'; //redirect to home
		$URL = explode("/", trim($URL,"/"));
		return $URL;	
	}

	public function loadController() //function to load the controllers
	{
		$URL = $this->splitURL();

		/** select controller **/
		$filename = "../app/controllers/".ucfirst($URL[0]).".php"; //redirect to controller
		if(file_exists($filename))
		{
			require $filename;
			$this->controller = ucfirst($URL[0]);
			unset($URL[0]);
		}else{

			$filename = "../app/controllers/_404.php"; //if there is no page with the name
			require $filename;
			$this->controller = "_404";
		}

		$controller = new $this->controller;

		/** select method **/
		if(!empty($URL[1]))
		{
			if(method_exists($controller, $URL[1]))
			{
				$this->method = $URL[1];
				unset($URL[1]);
			}	
		}

		call_user_func_array([$controller,$this->method], $URL);

	}	

}


