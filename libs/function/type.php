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
	function add_tasks() {
		include 'libs/db_connect.php';
		$task_name = $_POST['task_name'];
		$task_description = $_POST['task_description'];
		$task_authors = $_SESSION['login'];
		// $task_desc_files = $_POST['task_desc_files'];
		if(!empty($task_name)){
			if($_FILES['task_desc_files']['size']!=0){
				$uploaddir = 'tasks/';
				$uploadfile = $uploaddir.basename(rand().translit($_FILES['task_desc_files']['name']));
				if (move_uploaded_file($_FILES['task_desc_files']['tmp_name'], $uploadfile)) {
					$pdo->query('INSERT INTO tasks (id_groups, task_name, task_description, task_authors, task_desc_files) VALUES("'.$_SESSION['id_groups'].'", "'.$task_name.'", "'.$task_description.'", "'.$task_authors.'", "'.$uploadfile.'")');
					header('location: http://absolutetest/home/tasks');
					exit;
				} 
			} else {
				$pdo->query('INSERT INTO tasks (id_groups, task_name, task_description, task_authors) VALUES("'.$_SESSION['id_groups'].'", "'.$task_name.'", "'.$task_description.'", "'.$task_authors.'")');
				header('location: http://absolutetest/home/tasks');
				exit;
			}
		}
	}
	function accountExit(){
		unset($_SESSION['auth']);
		header('location: /');
	}
	function translit($s) {
	  $s = (string) $s;
	  $s = trim($s);
	  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
	  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
	  return $s;
	}
?>