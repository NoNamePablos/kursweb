<?php
include 'app/helpers/path.php';
include 'app/Database/db.php';
include 'app/controllers/users.php';
include 'app/controllers/films.php';
include  'app/helpers/helps_functions.php';
$posts=selectOne('film_overview',['id'=>$_GET['overview']]);
$user=selectOne('users',['id'=>$posts['id_user']]);
$film=selectOne('films',['id_film'=>$posts['id_film']]);
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
    <div class="overview-container container">
        <div class="overview">
            <!--
            Детальная рецензии
            -->
            <div class="overview-wrapper">
                <div class="overview-header">
                    <h1 class="overview-title">
                        <?=$posts['title']?>
                    </h1>
                    <div class="overview-img">
                        <img src="/assets/img/fdsf.jpg" alt="">
                    </div>
                    <div class="overview-post">
                        <div class="overview-film overview-setting">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path d="M448.4 208h-344l341.2-68c8.5-1.6 14-9.7 12.4-18.1l-8.9-45.4c-1.6-8.4-9.8-13.8-18.3-12.2L60.7 137.9c-8.5 1.6-14 9.7-12.4 18l8.9 45.4c.6 2.8 2.1 5.2 3.9 7.2-7.4 1.2-13.1 7.2-13.1 14.9v209.2c0 8.5 7 15.4 15.6 15.4h384.8c8.6 0 15.6-6.9 15.6-15.4V223.4c0-8.5-7-15.4-15.6-15.4zM305 402.4l-50.7-36.3-50.7 36.3 19.5-58.4-50.8-36H235l19.2-58.4 19.3 58.4h62.7l-50.8 36 19.6 58.4z"/></svg>
                            <a href="<?=BASE_URL.'detalnaya.php?film='.$film['id_film'];?>">
                                <span class="overview-user overview-film-title"><?=$film['film_name']?></span>
                            </a>
                        </div>
                        <div class="overview-add overview-setting">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14.81,12.28a3.73,3.73,0,0,0,1-2.5,3.78,3.78,0,0,0-7.56,0,3.73,3.73,0,0,0,1,2.5A5.94,5.94,0,0,0,6,16.89a1,1,0,0,0,2,.22,4,4,0,0,1,7.94,0A1,1,0,0,0,17,18h.11a1,1,0,0,0,.88-1.1A5.94,5.94,0,0,0,14.81,12.28ZM12,11.56a1.78,1.78,0,1,1,1.78-1.78A1.78,1.78,0,0,1,12,11.56ZM19,2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V5A3,3,0,0,0,19,2Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4H19a1,1,0,0,1,1,1Z"/></svg>
                            <span class="overview-user"><?=$user['username'];?></span>
                        </div>
                        <div class="overview-date overview-setting">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;white-space:normal;isolation:auto;mix-blend-mode:normal;solid-color:#000;solid-opacity:1" fill-rule="evenodd" d="M 9.5039062 0.013671875 A 0.50004988 0.50004988 0 0 0 9.0117188 0.52148438 L 9.0117188 2.0117188 L 7.5136719 2.0117188 C 7.2380119 2.0117188 7.015655 2.2341656 7.015625 2.5097656 L 7.015625 4.3085938 C 7.433925 4.2975938 8.0136719 4.6914062 8.0136719 4.6914062 L 8.0136719 3.0097656 L 9.3945312 3.0097656 A 0.50004988 0.50004988 0 0 0 9.6269531 3.0097656 L 13.386719 3.0097656 A 0.50004988 0.50004988 0 0 0 13.619141 3.0097656 L 15.001953 3.0097656 L 15.001953 8 L 11.310547 8 C 11.591787 8.2868 11.602354 8.6579 11.683594 9 L 15.5 9 C 15.77566 9 15.99998 8.7757 16 8.5 L 16 2.5097656 C 15.99998 2.2341656 15.77566 2.0117188 15.5 2.0117188 L 14.003906 2.0117188 L 14.003906 0.52148438 A 0.50004988 0.50004988 0 0 0 13.496094 0.013671875 A 0.50004988 0.50004988 0 0 0 13.003906 0.52148438 L 13.003906 2.0117188 L 10.011719 2.0117188 L 10.011719 0.52148438 A 0.50004988 0.50004988 0 0 0 9.5039062 0.013671875 z M 9.0117188 4.0078125 L 9.0117188 5.0058594 L 10.009766 5.0058594 L 10.009766 4.0078125 L 9.0117188 4.0078125 z M 11.007812 4.0078125 L 11.007812 5.0058594 L 12.007812 5.0058594 L 12.007812 4.0078125 L 11.007812 4.0078125 z M 13.005859 4.0078125 L 13.005859 5.0058594 L 14.003906 5.0058594 L 14.003906 4.0078125 L 13.005859 4.0078125 z M 5.4921875 5 C 2.4637775 5 6e-005 7.4657406 0 10.494141 C 0 13.522541 2.4637275 15.986328 5.4921875 15.986328 C 8.5206375 15.986328 10.986328 13.522541 10.986328 10.494141 C 10.986268 7.4657406 8.5205975 5 5.4921875 5 z M 5.4921875 5.9980469 C 7.9810875 5.9980469 9.9882412 8.0052406 9.9882812 10.494141 C 9.9882912 12.983141 7.9811275 14.988281 5.4921875 14.988281 C 3.0032475 14.988281 0.99803688 12.983141 0.99804688 10.494141 C 0.99808688 8.0052406 3.0032875 5.9980469 5.4921875 5.9980469 z M 11.007812 6.0039062 L 11.007812 7.0019531 L 12.007812 7.0019531 L 12.007812 6.0039062 L 11.007812 6.0039062 z M 13.005859 6.0039062 L 13.005859 7.0019531 L 14.003906 7.0019531 L 14.003906 6.0039062 L 13.005859 6.0039062 z M 5.4863281 6.6621094 A 0.50004988 0.50004988 0 0 0 4.9941406 7.1699219 L 4.9941406 10.494141 A 0.50004988 0.50004988 0 0 0 5.4941406 10.994141 L 8.5058594 10.994141 A 0.50004988 0.50004988 0 1 0 8.5058594 9.9941406 L 5.9941406 9.9941406 L 5.9941406 7.1699219 A 0.50004988 0.50004988 0 0 0 5.4863281 6.6621094 z " color="#000" enable-background="accumulate" font-family="sans-serif" font-weight="400" overflow="visible"/></svg>
                            <time class="overview-datetime">
                                <time datetime="Thu Dec 30 2021 06:14:50 GMT+0300 (Москва, стандартное время)"><?=$posts['created_date']?></time>
                            </time>
                        </div>
                    </div>
                </div>
                <div class="overview-content">

                    <div class="overview-main-content">
                        <?= $posts['content'];?>
                    </div>
                </div>

                <!---
                Блок с комментариями
                -->
                <div class="overview-comments">

                </div>
            </div>

        </div>



    </div>

    </div>
</main>
<? include ('app/includes/footer.php')?>
<script src="assets/js/jquery.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="assets/js/swiper.js"></script>
<script src="assets/js/modal.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/burger.js"></script>
<script src="assets/js/film_rating.js"></script>
<script src="assets/js/comments.js"></script>
</body>
</html>