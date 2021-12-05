<?php include ('app/helpers/path.php')?>
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
                    <img src="assets/img/brighton-4th-2021.jpg" alt="">
                    <button>Добавить в избранное</button>
                </div>
                <div class="detfilm-description">
                        <div class="films-item-content__setting">
                          <p>Премьера: <span class="films-item-content__setting-year">2021</span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Страна: <span class="films-item-content__setting-year">Украина</span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Продолжительность: <span class="films-item-content__setting-year">50 мин.</span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Возрастное ограничение: <span class="films-item-content__setting-year">16</span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Жанр: <span class="films-item-content__setting-year">Сериалы , Комедия , Детектив</span></p>
                        </div>
          
                        <div class="films-item-content__setting">
                          <p>Режиссер: <span class="films-item-content__setting-year">Александр Итыгилов мл.</span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Актерский состав: <span class="films-item-content__setting-year">Дмитрий Белякин, Сергей Бабкин, Георгий Поволоцкий, Дарья Петрожицкая</span></p>
                        </div>
                        <div class="films-item-content__setting">
                          <p>Описание: <span class="films-item-content__setting-year">История молодого юриста Влада Шевчука, который останавливается в шаге от своей мечты - карьеры в Лондонском суде, потому что не может избавиться от "наваждения" - он заметил, что собака брата начинает с ним. . разговаривать. . ...</span></p>
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
                    <video src="assets/video/1.mp4" controls="controls"></video>
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
  </body>
  </html>