<main role="main" class="container">
  <div class="d-flex align-items-center p-3 my-3 text-black-50 bg-light rounded shadow-sm">
    <i class="fas fa-tasks mr-3" width="48" height="48"></i>
    <div class="lh-100">
      <h6 class="mb-0 text-black lh-100">Список активных заданий</h6>
    </div>
  </div>
  <?php 
    $tasks = $pdo->query('SELECT * FROM tasks WHERE id_groups="'.$_SESSION['id_groups'].'" AND active=0');
    $tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
    if(empty($tasks)){
      ?>
      <div class="alert alert-light" style="text-align: center;" role="alert">
        Пусто!
        <?php 
          if($_SESSION['group']!=2){
            ?>
              <br>
              <a href="/home/tasks/add_tasks" style="font-size: 14px;" class="btn btn-link"><i class="fas fa-plus"></i> Добавить задание</a>
            <?php
          }
        ?>
      </div>
      <?php
    }
    foreach($tasks as $task) {
      ?>
      <div class="task my-3 p-3 bg-white rounded shadow-sm" style="position: relative; overflow: hidden;" data-task_id="<?=$task['id']?>" data-id="<?=$_SESSION['auth']?>">
        <div class="panel_task_home" style="width: 15%; height: 100%; position: absolute; top:0; right: 0; display: flex; justify-content: center; align-items: center;">
          <a href="#" id="task_ok" style="font-size: 2rem"><i class="fas fa-check-circle"></i></a>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125">
            <strong class="d-block text-gray-dark"><?=$task['task_name']?></strong>
            <?php 
            if(!empty($task['task_description'])){
              echo $task['task_description'];
            } else {
              echo 'Без описания';
            }
            if(!empty($task['task_desc_files'])){
              ?>
              <a style="display: table;" class="pt-1" href="<?=$task['task_desc_files']?>" download><i class="fas fa-paperclip"></i> <?=$task['task_desc_files']?></a>
              <?php
            }
            ?>
          </p>
        </div>
        <i class="fas fa-user-edit">&nbsp;</i><?=$task['task_authors']?>
        <i class="fas fa-eye"></i>&nbsp;
        <?
        $count = 0;
        if(!empty($task['view_id'])) {
          $view_acc = explode(',', $task['view_id']);
          foreach($view_acc as $view) {
            $name_acc = $pdo->query('SELECT login FROM users WHERE id="'.$view.'"');
            $name_acc = $name_acc->fetchAll(PDO::FETCH_ASSOC);
            $name_acc = $name_acc[0];
            ?>
            <span><?=$name_acc['login']?></span>
            <?php
          }
        } else {
          echo 'нет просмотров';
        }
        ?>
      </div>
      <?php
    }
  ?>
  </div>
</main>

<main role="main" class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-success rounded shadow-sm">
    <i class="fas fa-tasks mr-3" width="48" height="48"></i>
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">Список выполненных заданий</h6>
    </div>
  </div>
  <?php 
    $tasks = $pdo->query('SELECT * FROM tasks WHERE id_groups="'.$_SESSION['id_groups'].'" AND active=1');
    $tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
    if(empty($tasks)){
      ?>
      <div class="alert alert-light" style="text-align: center;" role="alert">
        Пусто!
      </div>
      <?php
    }
    foreach($tasks as $task) {
      ?>
      <div class="task my-3 p-3 bg-white rounded shadow-sm" style="position: relative; overflow: hidden;" data-task_id="<?=$task['id']?>" data-id="<?=$_SESSION['auth']?>">
        <div class="panel_ok_home" style="width: 100%; height: 100%; position: absolute; top:0; right: 0; display: flex; justify-content: center; align-items: center; background: linear-gradient(to top, rgba(17, 191, 87, 0.5), rgba(17, 191, 87, 0.5))"><i style="font-size: 2rem; color: #008033;" class="fas fa-check"></i>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125">
            <strong class="d-block text-gray-dark"><?=$task['task_name']?></strong>
            <?php 
            if(!empty($task['task_description'])){
              echo $task['task_description'];
            } else {
              echo 'Без описания';
            }
            if(!empty($task['task_desc_files'])){
              ?>
              <a style="display: table;" class="pt-1" href="<?=$task['task_desc_files']?>" download><i class="fas fa-paperclip"></i> <?=$task['task_desc_files']?></a>
              <?php
            }
            ?>
          </p>
        </div>
        <i class="fas fa-user-edit">&nbsp;</i><?=$task['task_authors']?>
        <i class="fas fa-eye"></i>&nbsp;
        <?
        $count = 0;
        if(!empty($task['view_id'])) {
          $view_acc = explode(',', $task['view_id']);
          foreach($view_acc as $view) {
            $name_acc = $pdo->query('SELECT login FROM users WHERE id="'.$view.'"');
            $name_acc = $name_acc->fetchAll(PDO::FETCH_ASSOC);
            $name_acc = $name_acc[0];
            ?>
            <span><?=$name_acc['login']?></span>
            <?php
          }
        } else {
          echo 'нет просмотров';
        }
        ?>
      </div>
      <?php
    }
  ?>
  </div>
</main>