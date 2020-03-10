<?php 
	class homeController {
		public function auth() {
			if(isset($_SESSION['auth'])){
				header('location: /');
			}
			$title = 'Авторизация/Регистрация';
			View::render('auth/auth', compact('title'));

		}
		public function index() {
			if(!isset($_SESSION['auth'])){
				$this->auth();
				exit;
			}
			$title = 'Главная страница';
			View::render('home/home', compact('title'));
		}
		public function users() {
			if(!isset($_SESSION['auth'])){
				$this->auth();
				exit;
			}
			$title = 'Пользователи';
			View::render('home/users', compact('title'));
		}
	}
?>