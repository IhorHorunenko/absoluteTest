<div class="container">
	<h2 class="pb-5" style="text-align: center;"><?=$title?></h2>
	<form enctype="multipart/form-data" class="container col-6" action="?type=add_tasks" method="POST">
		<table>
			<tr>
				<td><label for="task_name">Название:</label></td>
				<td class="col-12"><input id="task_name" class="form-control" type="text" name="task_name" required autofocus></td>
			</tr>
			<tr>
				<td><label for="task_description">Описание:</label></td>
				<td class="col-12"><textarea id="task_description" class="form-control" type="text" name="task_description"></textarea></td>
			</tr>
			<tr>
				<td><label for="task_description">Автор:</label></td>
				<td class="col-12"><input id="task_authors" class="form-control" type="text" name="task_authors" value="<?=$_SESSION['login']?>" disabled></td>
			</tr>
			<tr>
				<td class="col-12 pt-3" colspan="2" style="text-align: center;">
					<p>Прикрепление файла необязательно</p>
					<input id="task_desc_files" type="file" name="task_desc_files">
				</td>
			</tr>
			<tr style="text-align: center;">
				<td colspan="2">
					<button type="submit" class="btn btn-light">Добавить</button>
				</td>
			</tr>
		</table>
	</form>
</div>