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
            <h3>Избранное</h3>
            <section class="films">
                <div class="films-list">
                  <div class="films-item">
                    <h2 class="films-item--title">
                      <a href="">
                        Джек & Лондон (2021) 
                    </a>
                  </h2>
                  <div class="films-item-content">
                    <div class="  card">
                      <div class="card-image">
                        <img src="assets/img/brighton-4th-2021.jpg" alt="">
                          <div class="card-bg">
                            <h4 class="card-bg-name">Title</h4>
                            <div class="card-bg-content">
                              <div class="card-bg-content--setting">
                                <p>Год: <span class="card-info" data-info-year="2021">2021</span> </p>
                              </div>
                              <div class="card-bg-content--setting">
                                <p>Жанры: <span data-info-genres="Фэнтези,Роман,Дектив">Фэнтези,Роман,Дектив</span></p>
                              </div>
                            </div>
                            
                          </div>
                      </div>
                      
                    </div>
                    <div class="films-item-content__settings">
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
                  </div>



                </div>
              </section>  
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