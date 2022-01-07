<?php
include 'app/helpers/path.php';
include 'app/Database/db.php';
include 'app/controllers/users.php';
include 'app/controllers/films.php';
$films=selectAllFromFilmsWitUsersWithStatus('films','users',1);

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
    <div class="wrapper">

        <!--
        main-news
        -->
        <section class="films section">
            <div class="films-wrapper">
                <div class="films-title">
                    Новые фильмы
                </div>
                <div class="films-list">
                </div>
            </div>
        </section>
    </div>

</main>
<?php include ('app/includes/footer.php')?>
<script src="assets/js/jquery.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="assets/js/swiper.js"></script>
<script src="assets/js/modal.js"></script>
<script src="assets/js/burger.js"></script>
<script src="assets/js/loadCards.js"></script>
<script src="assets/js/film_rating.js"></script>
</body>
</html>
