<?php 
	include '../../libs/db_connect.php';
	$test_task = $pdo->query('SELECT view_id FROM tasks WHERE id="'.$_POST['id_task'].'"');
	$test_task = $test_task->fetchAll(PDO::FETCH_ASSOC);
	$test_task = $test_task[0]['view_id'];
	if(!empty($test_task)){
		$test_task = explode(',', $test_task);
		if(!in_array($_POST['id_account'], $test_task)) {
			$test_task = implode(',', $test_task);
			$test_task = $test_task.','.$_POST['id_account'];
			$pdo->query('UPDATE tasks SET view_id="'.$test_task.'" WHERE id="'.$_POST['id_task'].'"');
		}
	} else {
		$pdo->query('UPDATE tasks SET view_id="'.$_POST['id_account'].'" WHERE id="'.$_POST['id_task'].'"');
	}

	
	
?>