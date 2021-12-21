<?php
include 'app/helpers/path.php';
include 'app/Database/db.php';
include 'app/controllers/users.php';
$page=isset($_GET['page'])?$_GET['page']:1;
$limit=1;
$offset=$limit*($page-1);
$total_pages=round(countRow('films')/$limit,0);
$films=selectAllFromFilmsWitUsersWithStatusIndex('films','users',$limit,$offset);
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
                           <form action="" class="modal-content-form">
                            <div class="header-second--search input input-setting modal-content-form--item">
                                <input type="text" class="input-setting-field" placeholder="Логин" value="" required>
                            </div>
                            <div class="header-second--search input input-setting modal-content-form--item">
                                <input type="text" class="input-setting-field" placeholder="Пароль" value="" required>
                            </div>
                            <div class="modal-content-form-buttons modal-content-form--item">
                                <button class="btn">
                                    <span>Забыл пароль</span>
                                </button>
                                <button class="btn">
                                    <span>Регистрация</span>
                                </button>
                            </div>
                            <input type="submit"class="btn modal-content-form-btn modal-content-form--item" value="войти">
                           </form>
                       </div>
                    </div>
                </div>
            </div>
    
    
    
    
        </div>
    <section class="catalog">
      <div class="catalog-grid">
        <?php foreach ($films as $film):?>
          <div class="card">
            <a href="<?=BASE_URL.'detalnaya.php?film='.$film['id_film'];?>" class="card-image">
                <img src="<?=BASE_URL.'assets/uploads/'.$film['film_preview'];?>" alt="">
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
            </a>
          
            </div>
        <?php include 'app/includes/pagination.php';?>
          <?php endforeach;?>
      </div>
    </section>
    </main>
  <?php include ('app/includes/footer.php')?>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/main.js"></script>
  <script src="assets/js/burger.js"></script>
  </body>
</html>
