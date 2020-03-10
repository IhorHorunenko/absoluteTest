<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css">
<link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css">
<form class="form-signin text-center" action="" method="POST">
<h1 class="h4 mb-3 font-weight-normal">Авторизация/Регистрация</h1>
<div style="background: linear-gradient(to top, rgba(255,32,20,0.4), rgba(255,32,20,0.4)); border-radius: 5px;">
  <p style="padding: 5px 0; color: #8a0700;">
    Для регистрации достаточно ввести логин и пароль нового пользователя, затем нажать кнопку Регистрации!
  </p>
</div>
<input type="text" id="inputEmail" class="form-control" placeholder="login" name="login" required autofocus value="<?=isset($_POST['login'])?$_POST['login']:''?>">
<input type="password" id="inputPassword" class="form-control" placeholder="password" name="pass" value="<?=isset($_POST['pass'])?$_POST['pass']:''?>" required>
<div class="checkbox mb-3">
</div>
<?php 
  if(isset($_SESSION['alert'])){
    ?>
    <div class="<?=$_SESSION['type_alert']?>" role="alert">
      <?=$_SESSION['alert']?>
    </div>
    <?php
  }
?>
<div class="row" style="margin: 0 auto;">
  <button type="submit" style="border-radius: 5px 0 0 5px;" class="btn btn-success col-6" name="auth" value="authorization">Войти</button>
  <button type="submit" style="border-radius: 0 5px 5px 0;"  class="btn btn-dark col-6" name="auth" value="registration">Регистрация</button>
</div>
</form>