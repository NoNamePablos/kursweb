<?php
include 'app/helpers/path.php';
include 'app/Database/db.php';
include 'app/controllers/users.php';
include 'app/controllers/films.php';
$film=selectOne('films',['id_film'=>$_GET['film']]);
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
      <div class="container">
        <div class="detfilm">
            <div class="detfilm-header">
                <div class="detfilm-image">
                    <div class="detfilm-image--wrapper">
                        <img src="<?=BASE_URL.'assets/uploads/'.$film['film_preview'];?>" alt="<?=$film['film_name'];?>">
                    </div>
                    <a href="detalnaya.php?fav=<?=$film['id_film'];?>">Добавить в избранное</a>
                </div>
                <div class="detfilm-description">
                        <div class="films-item-content__setting">
                          <p>Премьера: <span class="films-item-content__setting-year"><?=$film['film_year'];?></span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Страна: <span class="films-item-content__setting-year"><?=$film['film_country'];?></span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Продолжительность: <span class="films-item-content__setting-year"><?=$film['film_time'];?> мин.</span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Возрастное ограничение: <span class="films-item-content__setting-year">16</span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Жанр: <span class="films-item-content__setting-year"><?=$film['film_genres'];?></span></p>
                        </div>
          
                        <div class="films-item-content__setting">
                          <p>Режиссер: <span class="films-item-content__setting-year"><?=$film['film_director'];?></span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Актерский состав: <span class="films-item-content__setting-year"><?=$film['film_acters'];?></span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Описание: <span class="films-item-content__setting-year"><?=$film['film_description'];?></span></p>
                        </div>
                </div>
                
            </div>
            <div class="detfilm-video">
                <div class="detfilm-video--header">
                   <h4>
                    Видео
                   </h4>
                </div>
                <div class="detfilm-video--video">
                    <video src="<?=BASE_URL.'assets/uploads/'.$film['film_video'];?>" controls="controls"></video>
                </div>
            </div>
        </div>



      </div>

    </div>
    </main>
  <? include ('app/includes/footer.php')?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/main.js"></script>
  <script src="assets/js/burger.js"></script>
  </body>
  </html>