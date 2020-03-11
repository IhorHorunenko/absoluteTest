<div class="container">
	<?php 
		$tasks = $pdo->query('SELECT * FROM tasks WHERE id_groups="'.$_SESSION['id_groups'].'"');
		$tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($tasks)){
			?>
			<a href="/home/tasks/add_tasks" class="btn btn-light mb-5"><i class="fas fa-plus"></i> Добавить задание</a>
			<?php
		} else {
			?>
			<div style="text-align: center;" class="alert alert-light" role="alert">
				Список заданий пуст!
				<br>
				<a href="/home/tasks/add_tasks" style="font-size: 14px;" class="btn btn-link"><i class="fas fa-plus"></i> Добавить задание</a>
			</div>
			<?php
		}
	?>

	<!-- <div class="card" style="width: 18rem;">
	  <img src="..." class="card-img-top" alt="...">
	  <div class="card-body">
	    <h5 class="card-title">Card title</h5>
	    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
	    <a href="#" class="btn btn-primary">Go somewhere</a>
	  </div>
	</div> -->
</div>