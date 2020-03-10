<div class="container">
	<div class="container">
		<a href="/home/users" class="btn btn-light"><i class="fas fa-caret-left"></i> Назад</a>
		<form action="" method="POST">
			<table class="col-6" style="margin: 0 auto;">
				<tr>
					<td style="text-align: center;">
						<label for="parent">
							<i id="people" style="font-size: 4rem; text-align: center;" class="fas fa-male mt-5" ></i>
							<br>
							<input id="parent" type="radio" name="people" value="parent" checked="checked">
						</label>
						<label for="children">
							<i id="people" style="font-size: 4rem; text-align: center;" class="fas fa-child mt-5"></i>
							<br>
							<input id="children" type="radio" name="people" value="children">
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label for="login" style="width: 100%;">
							Логин пользователя:
							<br>
							<input class="form-control" id="login" type="text" name="login" placeholder="login" required autofocus>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label for="pass" style="width: 100%;">
							Пароль пользователя:
							<br>
							<input class="form-control" id="pass" type="text" name="pass" placeholder="pass" required>
						</label>
					</td>
				</tr>
				<tr>
					<td style="text-align: center;">
						<a href="?type=add_user" class="btn btn-success">Добавить</a>
					</td>
				</tr>
			</table>
	</form>
</div>
</div>