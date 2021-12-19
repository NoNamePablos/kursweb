<?php
include '../../app/Database/db.php';
include '../../app/controllers/films.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="#111111" />
    <title>Filmlib</title>
    <link rel="stylesheet" href="/assets/scss/vendor.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src = "https://use.fontawesome.com/a6b6076a89.js " > </script>
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="/assets/scss/main.css" />
</head>

<body>
<?php include('../../app/includes/admin_header.php');?>
<main id="main " >
    <!-- <div class="container">
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
                         <form  method="post" class="modal-content-form">-->
    <!---
    <div class="header-second--search input input-setting modal-content-form--item">
        <input type="text" name="email" class="input-setting-field" placeholder="Логин" value="" required>
    </div>
    <div class="header-second--search input input-setting modal-content-form--item">
        <input type="text" name="password" class="input-setting-field" placeholder="Пароль" value="" required>
    </div>
    -->
    <!--             <a href="<?php /*echo BASE_URL*/?>login.php" class="btn modal-content-form-btn modal-content-form--item">
                                <span>Авторизоваться</span>
                            </a>
                            <div class="modal-content-form-buttons modal-content-form--item">
                                <a href="<?php /*echo BASE_URL*/?>reset.php" class="btn">
                                    <span>Забыл пароль</span>
                                </a>
                                <a href="<?php /*echo BASE_URL*/?>registration.php" class="btn">
                                    <span>Регистрация</span>
                                </a>
                            </div>
                            <input type="submit" name="btn-log" class="btn  modal-content-form-btn modal-content-form--item" value="Войти">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div class="admin-wrapper">
        <?php
        include "../../app/includes/admin_sidebar.php";?>
        <section class="admin-add--wrapper">
            <form action="edit.php"  method="post" class="admin-add--form form-horizontal was-validated" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$id;?>">
                <div class="mb-3">
                    <label for="validationServer05" class="form-label">Название фильма</label>
                    <input type="text" class="form-control " name="film_name" id="validationServer05" value='<?=$title;?>'aria-describedby="validationServer05Feedback" required>
                    <div class="invalid-feedback"> Введите название фильма</div>

                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="film_preview" aria-label="Загрузить превью" required>
                    <div class="invalid-feedback">Загрузить превью</div>
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="film_video" aria-label="Загрузить видео" required>
                    <div class="invalid-feedback">Загрузить видео</div>
                </div>
                <div class="mb-3">
                    <label for="validationTextarea" class="form-label">Описание</label>
                    <textarea class="form-control " name="film_description" id="validationTextarea" placeholder="Required example textarea" required><?=$descr;?></textarea>
                    <div class="invalid-feedback">
                        Введите описание
                    </div>
                </div>
                <div class="mb-3">
                    <label for="validationServer07" class="form-label">Актеры</label>
                    <input type="text" class="form-control " name="film_genres" id="validationServer07" value="<?=$acters;?>" aria-describedby="validationServer07Feedback" required>
                    <div class="invalid-feedback"> Введите Актеров</div>
                </div>
                <div class="mb-3">
                    <label for="validationServer07" class="form-label">Страна</label>
                    <input type="text" class="form-control " name="film_country" id="validationServer07" value="<?=$film_contry;?>" aria-describedby="validationServer07Feedback" required>
                    <div class="invalid-feedback"> Введите Страны</div>
                </div>
                <div class="mb-3">
                    <label for="validationServer07" class="form-label">Актеры</label>
                    <input type="text" class="form-control " name="film_director" id="validationServer07" value="<?=$director;?>" aria-describedby="validationServer07Feedback" required>
                    <div class="invalid-feedback"> Введите Режисера</div>
                </div>
                <div class="mb-3">
                    <label for="validationServer07" class="form-label">Жанры</label>
                    <input type="text" class="form-control " name="film_acters" id="validationServer07" value="<?=$genres;?>" aria-describedby="validationServer07Feedback" required>
                    <div class="invalid-feedback"> Введите жанры</div>
                </div>
                <div class="mb-3">
                    <label for="validationServer08" class="form-label">Мировые сборы</label>
                    <input type="text" class="form-control " name="film_world_money" id="validationServer08" value="<?=$world_money;?>" aria-describedby="validationServer08Feedback" required>
                    <div class="invalid-feedback">Мировые сборы</div>
                </div>

                <div class="mb-3">
                    <label for="validationServer09" class="form-label">Сборы в России</label>
                    <input type="text" class="form-control " name="film_rus_money" id="validationServer09" value="<?=$rus_money;?>" aria-describedby="validationServer09Feedback" required>
                    <div class="invalid-feedback">Сборы в России</div>
                </div>

                <div class="mb-3">
                    <label for="validationServer05" class="form-label">Год</label>
                    <input type="text" class="form-control " name="film_year" id="validationServer010" value="<?=$year;?>" aria-describedby="validationServer010Feedback" required>
                    <div class="invalid-feedback">Год</div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="publish" value="1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Publish?
                    </label>
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" name="edit_film" value="Сохранить" >
                </div>
            </form>
        </section>
    </div>

</main>
<?php include ('../../app/includes/footer.php')?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="/assets/js/modal.js"></script>
</body>
</html>
