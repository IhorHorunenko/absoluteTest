<?php 
	if(isset($_GET['type'])){
		$f = $_GET['type'];
		$f();
	}
	function add_user() {
		include 'libs/db_connect.php';
		$people = $_POST['people'];
		$login = $_POST['login'];
		$pass = $_POST['pass'];
		if(!empty($people)&&!empty($login)&&!empty($pass)){
			$test_bd = $pdo->query('SELECT * FROM users WHERE login="'.$login.'"');
			$test = $test_bd->fetchAll(PDO::FETCH_ASSOC);
			if(empty($test)){
				$id_groups = $pdo->query('SELECT id_groups FROM users WHERE id="'.$_SESSION['auth'].'"');
				$id_group = $id_groups->fetchAll(PDO::FETCH_ASSOC);
				$id_group = $id_group[0];
				$pdo->query('INSERT INTO users(login, password, groups, id_groups) VALUES("'.$login.'", "'.$pass.'", "'.$people.'", "'.$id_group['id_groups'].'")');
				$id = $pdo->query('SELECT id FROM users WHERE login="'.$login.'"');
				$id = $id->fetchAll(PDO::FETCH_ASSOC);
				$test_bd = $pdo->query('SELECT id_users_group FROM user_group WHERE id_groups="'.$id_group['id_groups'].'"');
				$test = $test_bd->fetchAll(PDO::FETCH_ASSOC);
				$id_users_group = $test[0]['id_users_group'].','.$id[0]['id'];
				$pdo->query('UPDATE user_group SET id_users_group = "'.$id_users_group.'" WHERE id_groups="'.$id_group['id_groups'].'"');
				unset($_SESSION['alert']);
				header('location: /home/users');
			} else {
				alert('alert alert-danger', 'Такой пользователь существует!');
			}
		} else {
			alert('alert alert-danger', 'Заполните поля!');
		}
	}
	function accountExit(){
		unset($_SESSION['auth']);
		header('location: /');
	}
?>