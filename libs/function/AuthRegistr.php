<?php 
	if(isset($_POST['auth'])){
		$f = $_POST['auth'];
		$f();
	}
	function registration() {
		include 'libs/db_connect.php';
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		if(!empty($login)&&!empty($pass)){
			$test_bd = $pdo->query('SELECT * FROM users WHERE login="'.$login.'"');
			$test = $test_bd->fetchAll(PDO::FETCH_ASSOC);
			if(empty($test)){
				$pdo->query('INSERT INTO users(login, password) VALUES("'.$login.'", "'.$pass.'")');
				alert('alert alert-success', 'Регистрация прошла успешно!');
			} else {
				alert('alert alert-danger', 'Такой пользователь существует!');
			}
			
		} else {
			alert('alert alert-danger', 'Заполните поля!');
		}
	}
	function authorization() {
		include 'libs/db_connect.php';
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		if(!empty($login)&&!empty($pass)){
			$test_bd = $pdo->query('SELECT * FROM users WHERE login="'.$login.'"');
			$test = $test_bd->fetchAll(PDO::FETCH_ASSOC);
			if(!empty($test)){
				if($test[0]['password']==$pass){
					$_SESSION['auth'] = $test[0]['id'];
				} else {
					alert('alert alert-danger', 'Логин или пароль неверный!');
				}
			} else {
				alert('alert alert-danger', 'Логин или пароль неверный!');
			}
		}
	}
	function alert($class, $text) {
		$_SESSION['type_alert'] = $class;
		$_SESSION['alert'] = $text;
	}
?>