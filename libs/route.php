<?php 
	class Route {
		static function start() {
			$url = isset($_GET['url'])?$_GET['url']:'home';
			$url = explode('/', $url);
			$controller = $url[0].'Controller';
			if(file_exists('controller/'.$controller.'.php')){
				require_once 'controller/'.$controller.'.php';
				$controller = new $controller;
				$method = isset($url[1])?$url[1]:'index';
				if(method_exists($controller, $method)){
					$controller->$method();
				} else {
					header("HTTP/1.0 404 Not Found");
					exit(); 
				}
			} else {
				header("HTTP/1.0 404 Not Found");
				exit(); 
			}
		}
	}
?>