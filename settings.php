<?php
include 'app/helpers/path.php';
include 'app/Database/db.php';
include 'app/controllers/users.php';

?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="#111111" />
    <title>Filmlib</title>
    <link rel="stylesheet" href="assets/scss/vendor.css" />
    <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>
    <link rel="stylesheet" href="assets/scss/main.css" />
  </head>

  <body>
  <?php include('app/includes/header.php');?>
    <main id="main">
        <?php if(isset($_SESSION['id'])):?>
        <div class="reset-container">
        <h1>Настройки  id: <?php echo $IdUpdate ?></h1>
        <form action="settings.php" method="post" class="reset-form">
            <div class="header-second--search input input-setting">
                <input type="text"  name='email' class="input-setting-field" placeholder="E-mail" value="<?php echo selectOne('users',['id'=>$_SESSION['id']])['email']?>">
            </div>
            <div class="header-second--search input input-setting">
                <input type="text" name="age" class="input-setting-field" placeholder="Возраст" value="<?php echo selectOne('users',['id'=>$_SESSION['id']])['age']?>">
            </div>
            <div class="header-second--search input input-setting">
                <input type="text" name='password-old'class="input-setting-field" placeholder="Старый пароль" value="">
            </div>
            <div class="header-second--search input input-setting">
                <input type="text" name='password-new'class="input-setting-field" placeholder="Новый пароль" value="">
            </div>
             <input  type="submit" name="btn-update"class="btn-submit btn header-second-user--login" value="Сохранить">
           
        </form>
    </div>
        <?php else:?>
            <H1>Авторизируйтесь</H1>
        <?php endif;?>
    </main>

  <? include ('app/includes/footer.php')?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
  </html>