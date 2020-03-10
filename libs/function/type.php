<?php 
	if(isset($_GET['type'])){
		$f = $_GET['type'];
		$f();
	}
	function accountExit(){
		unset($_SESSION['auth']);
		header('location: /');
	}
?>