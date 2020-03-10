<div class="nav-scroller bg-white shadow-sm">
  <div class="container" style="text-align: center;">
    <nav class="nav nav-underline" style="position: relative; display: flex; align-items: center;">
      <a class="nav-link active" href="/" style="font-family: 'Dancing Script', cursive; font-size: 25px;">Absolute Test</a>
      <a class="nav-link active" href="/">Главная</a>
      <a class="nav-link" href="/home/users">
        Пользователи
        <span class="badge badge-pill bg-light align-text-bottom">
          <?php
            $test_db = $pdo->query('SELECT * FROM user_group WHERE id_groups="'.$_SESSION['auth'].'"');
            $test = $test_db->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($test)) {
              $test = explode(',', $test[0]['id_users_group']);
              echo count($test);
            }
          ?>
        </span>
      </a>
      <a class="nav-link" href="#">
        Задания
        <span class="badge badge-pill bg-light align-text-bottom">0</span>
      </a>
      <a class="nav-link" href="#">Настройки</a>
      <a class="nav-link" style="position: absolute; right: 0;" href="?type=accountExit">Выход <i class="fas fa-door-open"></i></a>
    </nav>
  </div>
</div>
<div class="my-3 p-3 bg-white">