<div class="container">
	<a class="btn btn-light mb-5" href="/home/users/add_user"><i class="fas fa-user-plus"></i> Добавить пользователя</a>
<div class="row">
<?php 
	$id=$pdo->query('SELECT id_groups FROM users WHERE id="'.$_SESSION['auth'].'"');
	$id=$id->fetchAll(PDO::FETCH_ASSOC);
	$id=$id[0]['id_groups'];
	$test_db = $pdo->query('SELECT * FROM user_group WHERE id_groups="'.$id.'"');
	$test = $test_db->fetchAll(PDO::FETCH_ASSOC);
	if(empty($test)){
		?>
		<div class="alert alert-light" style="text-align: center;" role="alert">
		  Список пользователей пуст!
		</div>
		<?php
	} else {
		$id_users_fgroup = explode(',', $test[0]['id_users_group']);
		foreach($id_users_fgroup as $id) {
			$users_group = $pdo->query('SELECT * FROM users WHERE id="'.$id.'"');
			$users_info = $users_group->fetchAll(PDO::FETCH_ASSOC);
			foreach($users_info as $user) {
				?>
					<div class="card" style="width: 18rem;">
						<?php 
							if($user['groups']==1){
								?>
								<span style="position: absolute; top: 10px; right: 10px;" class="badge badge-success"><i class="fas fa-users-cog"></i> Родитель</span>
								<i style="font-size: 3rem; text-align: center;" class="fas fa-male mt-5" ></i>
								<?php
							} else {
								?>
								<i style="font-size: 3rem; text-align: center;" class="fas fa-child mt-5"></i>
								<?php
							}
						?>
							<div class="card-body" style="text-align: center;">
							<h5 class="card-title"><?=$user['login']?></h5>
							<p>
								<?php
								if($user['groups']==1){
									?>
									<p class="badge badge-danger">Группа имеет полный доступ!</p>
									<?php
								} 
								?>
							</p>
						</div>
					</div>
				<?php
			}
		}
	}
?>
</div>
</div>