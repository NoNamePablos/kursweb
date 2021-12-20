<?php
include 'app/helpers/path.php';
include 'app/Database/db.php';
include 'app/controllers/users.php';
include 'app/controllers/films.php';
$films=selectAllFromFilmsWitUsersWithStatus('films','users',1);
showArr($films);
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
     
            <div class="modals">
                <div class="modal-overlay">
                    <div class="modal modal--1" data-target="form-popup">
                       <div class="modal-header">
                           <h3 class="modal-header--title">Вход</h3>
                           <button class="modal-close btn">
                            <span class="MuiButton-label"><svg class="MuiSvgIcon-root c305" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg></span>
                           </button>
                       </div>
                       <div class="modal-content">
                           <form  method="post" class="modal-content-form">
                            <!---
                            <div class="header-second--search input input-setting modal-content-form--item">
                                <input type="text" name="email" class="input-setting-field" placeholder="Логин" value="" required>
                            </div>
                            <div class="header-second--search input input-setting modal-content-form--item">
                                <input type="text" name="password" class="input-setting-field" placeholder="Пароль" value="" required>
                            </div>
                            -->
                               <a href="<?php echo BASE_URL?>login.php" class="btn modal-content-form-btn modal-content-form--item">
                                   <span>Авторизоваться</span>
                               </a>
                            <div class="modal-content-form-buttons modal-content-form--item">
                                <a href="<?php echo BASE_URL?>reset.php" class="btn">
                                    <span>Забыл пароль</span>
                                </a>
                                <a href="<?php echo BASE_URL?>registration.php" class="btn">
                                    <span>Регистрация</span>
                                </a>
                            </div>
                            <input type="submit" name="btn-log" class="btn  modal-content-form-btn modal-content-form--item" value="Войти">
                           </form>
                       </div>
                    </div>
                </div>
            </div>
    
    
    
    
        </div>
        <section class="top-films">
<!-- Slider main container -->
    <?php if(count($films)!=0):?>
    <div class="swiper">
    <?php endif;?>
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <?php foreach ($films as $film):?>
      <div class="swiper-slide  card">
        <a href='<?=BASE_URL.'detalnaya.php?film='.$film['id_film'];?>' class="card-image">
          <img src="<?=BASE_URL.'assets/uploads/'.$film['film_preview'];?>" alt="">
            <div class="card-bg">
              <h4 class="card-bg-name"><?=$film['film_name'];?></h4>
              <div class="card-bg-content">
                <div class="card-bg-content--setting">
                  <p>Год: <span class="card-info" ><?=$film['film_year'];?></span> </p>
                </div>
                <div class="card-bg-content--setting">
                  <p>Жанры: <span data-info-genres="Фэнтези,Роман,Дектив"><?=$film['film_genres'];?></span></p>
                </div>
              </div>
              
            </div>
        </a>
        
      </div>
        <?php endforeach;?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
  
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
  
        </section>

      <section class="films">
        <div class="films-list">
        <?php foreach ($films as $film):?>
          <div class="films-item">
            <h2 class="films-item--title">
              <a href="<?=BASE_URL.'detalnaya.php?film='.$film['id_film'];?>">
                <?=$film['film_name'];?>
            </a>
          </h2>
          <div class="films-item-content">
            <div class="  card">
              <div class="card-image">
                <img src="<?=BASE_URL.'assets/uploads/'.$film['film_preview'];?> " alt="">
                  <div class="card-bg">
                    <h4 class="card-bg-name"><?=$film['film_name'];?></h4>
                    <div class="card-bg-content">
                      <div class="card-bg-content--setting">
                        <p>Год: <span class="card-info" data-info-year="2021"><?=$film['film_year'];?></span> </p>
                      </div>
                      <div class="card-bg-content--setting">
                        <p>Жанры: <span data-info-genres="Фэнтези,Роман,Дектив"><?=$film['film_genres'];?></span></p>
                      </div>
                    </div>
                    
                  </div>
              </div>
              
            </div>
            <div class="films-item-content__settings">
              <div class="films-item-content__setting">
                <p>Премьера: <span class="films-item-content__setting-year"><?=$film['film_year'];?></span></p>
              </div>
              <div class="films-item-content__setting">
                <p>Страна: <span class="films-item-content__setting-year"><?=$film['film_country'];?></span></p>
              </div>
              <div class="films-item-content__setting">
                <p>Продолжительность: <span class="films-item-content__setting-year"><?=$film['film_time'];?></span></p>
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
          </div>
            <?php endforeach;?>
        </div>
      </section>  
    </main>
    <?php include ('app/includes/footer.php')?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/modal.js"></script>
  </body>
</html>
