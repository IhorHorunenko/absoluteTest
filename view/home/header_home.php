<div class="nav-scroller bg-white shadow-sm">
  <div class="container" style="text-align: center;">
    <nav class="nav nav-underline" style="position: relative; display: flex; align-items: center;">
      <a class="nav-link active" href="/" style="font-family: 'Dancing Script', cursive; font-size: 25px;">Absolute Test</a>
      <?php 
      if($_SESSION['group']!=2){
        ?>
        <a class="nav-link" href="/home/users">
        Пользователи
          <span class="badge badge-pill bg-light align-text-bottom">
            <?php
              $id=$pdo->query('SELECT id_groups FROM users WHERE id="'.$_SESSION['auth'].'"');
              $id=$id->fetchAll(PDO::FETCH_ASSOC);
              $id=$id[0]['id_groups'];
              $test_db = $pdo->query('SELECT * FROM user_group WHERE id_groups="'.$id.'"');
              $test = $test_db->fetchAll(PDO::FETCH_ASSOC);
              if(!empty($test)) {
                $test = explode(',', $test[0]['id_users_group']);
                echo count($test);
              }
            ?>
          </span>
        </a>
        <a class="nav-link" href="/home/tasks">
          Задания
          <span class="badge badge-pill bg-light align-text-bottom">
            <?php 
              $tasks = $pdo->query('SELECT * FROM tasks WHERE id_groups="'.$_SESSION['id_groups'].'"');
              $tasks = $tasks->fetchAll(PDO::FETCH_ASSOC);
              echo count($tasks);
            ?>
          </span>
        </a>
        <?php
      }
      ?>
      <a class="nav-link" style="position: absolute; right: 0;" href="?type=accountExit">Выход <i class="fas fa-door-open"></i></a>
    </nav>
  </div>
</div>
<div class="my-3 p-3 bg-white">