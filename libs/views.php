<?php 
	class View {
		static function render($src, $data=[]) {
			extract($data);
			unset($data);
			require_once 'view/header.php';
			require_once 'view/'.$src.'.php';
			require_once 'view/footer.php';
		}
	}
?>