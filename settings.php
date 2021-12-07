<?php
include 'app/helpers/path.php';
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
        <div class="reset-container">
        <h1>Настройки</h1>
        <form action="" class="reset-form">
            <div class="header-second--search input input-setting">
                <input type="text" class="input-setting-field" placeholder="Имя" value="">
            </div>
            <div class="header-second--search input input-setting">
                <input type="date" class="input-setting-field" placeholder="Возраст" value="">
            </div>
            <div class="header-second--search input input-setting">
                <input type="email" class="input-setting-field" placeholder="email" value="">
            </div>
            <div class="header-second--search input input-setting">
                <input type="text" class="input-setting-field" placeholder="Любимое животное" value="">
            </div>
             <input  type="submit" class="btn-submit btn header-second-user--login" value="Сохранить">
           
        </form>
    </div>
    </main>
  <? include ('app/includes/footer.php')?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
  </html>