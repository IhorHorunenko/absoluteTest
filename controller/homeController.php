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
		public function add_user() {
			if(!isset($_SESSION['auth'])){
				$this->auth();
				exit;
			}
			$title = 'Добавление пользователя';
			View::render('home/add_user', compact('title'));
		}
		public function tasks() {
			if(!isset($_SESSION['auth'])){
				$this->auth();
				exit;
			}
			$title = 'Задания';
			View::render('home/tasks', compact('title'));
		}
		public function add_tasks() {
			if(!isset($_SESSION['auth'])){
				$this->auth();
				exit;
			}
			$title = 'Добавление задания';
			View::render('home/add_tasks', compact('title'));
		}
	}
?>