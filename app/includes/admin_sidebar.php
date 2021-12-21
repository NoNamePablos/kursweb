<?php include "../../app/helpers/path.php";
?>
<nav class="admin-nav">
    <ul class="admin-nav--list">
        <li class="admin-nav--list__item" ><a class="admin-nav--list__item-link" href=" <?= BASE_URL."admin/films/index.php"?>">Фильмы</a></li>
        <li class="admin-nav--list__item"><a class="admin-nav--list__item-link" href="<?= BASE_URL. "admin/users/index.php";?>">Пользователи</a></li>
        <li class="admin-nav--list__item"><a class="admin-nav--list__item-link" href="">Тест</a></li>
    </ul>
</nav>
<nav class="admin-nav--mobile">
    <div class="burger-adm">
        <span class="burger-click"> ТЫК!</span>
        <ul class="admin-nav--list--test">
            <li class="admin-nav--list__item" ><a class="admin-nav--list__item-link" href=" <?= BASE_URL."admin/films/index.php"?>">Фильмы</a></li>
            <li class="admin-nav--list__item"><a class="admin-nav--list__item-link" href="<?= BASE_URL. "admin/users/index.php";?>">Пользователи</a></li>
            <li class="admin-nav--list__item"><a class="admin-nav--list__item-link" href="">Тест</a></li>
        </ul>
    </div>

</nav>