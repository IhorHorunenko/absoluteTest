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
				$test_bd = $pdo->query('SELECT * FROM users WHERE login="'.$login.'"');
				$test = $test_bd->fetchAll(PDO::FETCH_ASSOC);
				// print_r($test);
				$test = $test[0];
				$pdo->query('INSERT INTO user_group(id_groups, id_users_group) VALUES("'.$test['id'].'", "'.$test['id'].'")');
				$pdo->query('UPDATE users SET id_groups = "'.$test['id'].'" WHERE id="'.$test['id'].'"');
				alert('alert alert-success', 'Регистрация прошла успешно!');
				header('location: /');
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
					$_SESSION['login'] = $test[0]['login'];
					$_SESSION['group'] = $test[0]['groups'];
					$_SESSION['id_groups'] = $test[0]['id_groups'];
					unset($_SESSION['alert']);
					header('location: /');
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