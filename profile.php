<?php
include 'app/helpers/path.php';
include 'app/Database/db.php';
include 'app/controllers/users.php';
include 'app/controllers/films.php';
$array=array();
if(isset($_SESSION['favourites'])){
    foreach (array_unique($_SESSION['favourites']) as $item){
        if(!empty($item)){
            $film=selectOne('films',['id_film'=>$item]);
            array_push($array,$film);
        }
    }
}
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
        <?php if(isset($_SESSION['id'])):?>
        <div class="container">
            <h3>Избранное</h3>
            <section class="films">
                <div class="films-list">
                    <?php if(isset($_SESSION['favourites'])&&count($array)>0):?>
                    <?php foreach ($array as $film):?>
                        <?php if(!empty($film)):?>
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
                                <a class="close" href="profile.php?deletefav_id=<?=$film['id_film'];?>">X</a>
                            </div>
                            <?php else:?>
                                <a href="index.php"><h3>Пока ещё ничего не добавлено =(</h3></a>
                            <?php endif;?>
                    <?php endforeach;?>
                    <?php else:?>
                        <a href="index.php"><h3>Пока ещё ничего не добавлено =(</h3></a>
                    <?php endif;?>

                </div>
              </section>  
        </div>
        <?php else:?>
        <H1>Авторизируйтесь</H1>
        <?php endif;?>
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