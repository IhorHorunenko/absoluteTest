<?php 
	include '../../libs/db_connect.php';
	$pdo->query('UPDATE tasks SET active=1 WHERE id="'.$_POST['id_task'].'"');
?>