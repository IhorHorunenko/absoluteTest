<div class="container">
	<?php 
		$tasks = $pdo->query('SELECT * FROM tasks WHERE id_groups="'.$_SESSION['id_groups'].'"');
		$tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
		if(!empty($tasks)){
			?>
			<a href="/home/tasks/add_tasks" class="btn btn-light mb-5"><i class="fas fa-plus"></i> Добавить задание</a>
			<div class="row">
			<?php 
				foreach($tasks as $task){
					?>
					<div class="card col-4" style="width: 18rem;">
						<div class="card-body pb-2">
							<span style="position: absolute;bottom: 0; right: 10px;"><?=$task['task_authors']?></span>
							<h5 style="text-align: center;" class="card-title"><?=$task['task_name']?></h5>
							<h6>Описание:</h6>
							<?php 
								if(!empty($task['task_description'])){
									?>
									<p class="card-text" style="overflow: hidden; text-overflow: ellipsis; color:#696969; height: 100px;"><?=$task['task_description']?></p>
									<?php
								} else {
									?>
									<p class="card-text" style="color:#696969; height: 100px;">Без описания</p>
									<?php
								}
								if(!empty($task['task_desc_files'])){
									?>
									<a style="font-size: 1rem;" href="../<?=$task['task_desc_files']?>" download><i class="fas fa-paperclip"></i> <?=$task['task_desc_files']?></a>
									<?php
								}
							?>
						</div>
					</div>
					<?php
				}
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
	</div>
</div>