<?php
include 'app/helpers/path.php';
include 'app/Database/db.php';
include 'app/controllers/users.php';
$page=isset($_GET['page'])?$_GET['page']:1;
$limit=2;
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
                            <button class="modal-close btn btn-modal-close">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    
    
        </div>
    <section class="catalog ">
        <div class="catalog-wrapper">
            <div class="catalog-info">
                <h2>Фильмы</h2>
            </div>
            <div class="catalog-grid section">
                <?php foreach ($films as $film):?>
                    <div class="swiper-slide catalog-card card-main">
                        <div class="item">
                            <div class="tooltip--wrapper">
                                <div class="tooltip tooltip__type">Фильм</div>
                                <div class="tooltip tooltip__typeadd">Новинка</div>
                            </div>
                            <div class="card-image">
                                <div class="card-bg">
                                    <div class="card-bg__info">
                                        <div class="info--tooltip">
                                            <div class="info--tooltip__popup">
                                                <div class="tooltip-content">
                                                    <span><?=$film['created_date'];?></span>
                                                    <span><?=$film['film_description'];?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-bg__upbg">
                                        <a href='<?=BASE_URL.'detalnaya.php?film='.$film['id_film'];?>' class="card-bg__play">
                                            <svg viewBox="83.1 54.3 61.5 73.1"><polygon points="83.1,54.3 83.1,127.4 144.7,90.9"></polygon></svg>
                                        </a>
                                    </div>
                                </div>
                                <img src="<?=BASE_URL.'assets/uploads/'.$film['film_preview'];?>" class="card-bg__image" alt="">

                            </div>
                            <div class="card-main--rate">
                                <a href="#" class="rate rate__positiv">
                                          <span>
                                                <svg viewBox="61.9 84.9 200.8 194.4">
                                                <path d="M237,146c-4-0.8-8.8-0.8-11.2-0.8h-41V98.6c0-8-6.4-13.7-13.7-13.7h-19.3c-7.2,0-12.9,4.8-15.3,11.2l-11.2,47.4c0,0.8-1.6,3.2-1.6,3.2l-19.3,20.1c0,0-0.8,0.8-0.8,1.6c-0.8,0-1.6,0.8-1.6,0.8H78.8c-8.8,0-16.9,5.6-16.9,14.5v61c0,8.8,8,16.1,16.9,16.1h23.3c1.6,0,3.2-0.8,4.8-0.8l16.1,13.7c4,3.2,9.6,5.6,14.5,5.6h72.3c39.4,0,53-31.3,53-57v-41.8C261.1,158,245.8,148.4,237,146z M81.2,186.9h18.5v56.2H81.2L81.2,186.9L81.2,186.9z M243.4,222.3c0,11.2-3.2,36.9-34.5,36.9h-72.3c-0.8,0-2.4-0.8-2.4-0.8l-16.1-12.9v-0.8v-61v-1.6c0-0.8,0-1.6,0.8-1.6l19.3-20.1c3.2-3.2,5.6-7.2,6.4-11.2l10.4-44.2h9.6v43.4c0,8,7.2,14.5,15.3,14.5h45c2.4,0,5.6,0,6.4,0.8c1.6,0.8,10.4,4,10.4,16.1C243.4,180.5,243.4,222.3,243.4,222.3z"></path>
                                            </svg>
                                          </span>

                                </a>
                                <a href="" class="rate rate__negativ">
                                         <span>
                                                <svg viewBox="61.9 84.9 200.8 194.4">
                                                <path d="M237,146c-4-0.8-8.8-0.8-11.2-0.8h-41V98.6c0-8-6.4-13.7-13.7-13.7h-19.3c-7.2,0-12.9,4.8-15.3,11.2l-11.2,47.4c0,0.8-1.6,3.2-1.6,3.2l-19.3,20.1c0,0-0.8,0.8-0.8,1.6c-0.8,0-1.6,0.8-1.6,0.8H78.8c-8.8,0-16.9,5.6-16.9,14.5v61c0,8.8,8,16.1,16.9,16.1h23.3c1.6,0,3.2-0.8,4.8-0.8l16.1,13.7c4,3.2,9.6,5.6,14.5,5.6h72.3c39.4,0,53-31.3,53-57v-41.8C261.1,158,245.8,148.4,237,146z M81.2,186.9h18.5v56.2H81.2L81.2,186.9L81.2,186.9z M243.4,222.3c0,11.2-3.2,36.9-34.5,36.9h-72.3c-0.8,0-2.4-0.8-2.4-0.8l-16.1-12.9v-0.8v-61v-1.6c0-0.8,0-1.6,0.8-1.6l19.3-20.1c3.2-3.2,5.6-7.2,6.4-11.2l10.4-44.2h9.6v43.4c0,8,7.2,14.5,15.3,14.5h45c2.4,0,5.6,0,6.4,0.8c1.6,0.8,10.4,4,10.4,16.1C243.4,180.5,243.4,222.3,243.4,222.3z"></path>
                                            </svg>
                                         </span>
                                </a>
                            </div>
                            <h2 class="card-main--title">
                                <a href="<?=BASE_URL.'detalnaya.php?film='.$film['id_film'];?>">
                                    <?=$film['film_name'];?>
                                </a>
                            </h2>
                        </div>

                    </div>

                <?php endforeach;?>
            </div>
            <?php include 'app/includes/pagination.php';?>
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
