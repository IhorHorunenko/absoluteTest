<?php 
	class homeController {
		public function auth() {
			require_once 'libs/function/AuthRegistr.php';
			$title = 'Авторизация/Регистрация';
			View::render('auth/auth', compact('title'));

		}
		public function index() {
			$title = 'Главная страница';
			View::render('home/home', compact('title'));
		}
		function __construct(){
			if(!isset($_SESSION['auth'])){
				$this->auth();
				exit;
			} else {
				$this->index();
				exit;
			}
		}
	}
?>