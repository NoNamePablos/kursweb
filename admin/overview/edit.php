<?php
include '../../app/helpers/path.php';
include '../../app/Database/db.php';
include '../../app/controllers/overview.php';
$films=selectAll('films');
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
    <script src = " https://use.fontawesome.com/a6b6076a89.js " > </script>
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="/assets/scss/main.css" />
</head>

<body>
<?php include('../../app/includes/admin_header.php');?>
<main id="main " >

    <div class="admin-wrapper">
        <?php
        include "../../app/includes/admin_sidebar.php";?>
        <section class="admin-add--wrapper">
            <form action="edit.php" method="post" class="overview-form reset-form">
                <input type="hidden" name="id" value="<?=$id_overview;?>">
                <div class=" overview-form-title form-group mb-3">
                    <label for="over-title">Название статьи</label>
                    <input type="text" class="form-control"  value="<?=$title;?>" name="over-titles" id="over-title" placeholder="Название статьи">
                </div>
                <div class="mb-3">
                    <label for="over-prev">Постер</label>
                    <input type="file" class="form-control" name="over-prev" id="over-prev" aria-label="Загрузить превью" required>
                    <div class="invalid-feedback">Загрузить постер</div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="editor" name="over-content" rows="3"><?=$content;?></textarea>
                </div>
                <div class=" overview-form-select form-group">
                    <label for="exampleFormControlSelect1">Фильм</label>
                    <select class="form-control" name="over-selected" id="exampleFormControlSelect1">
                        <option value="-1">Выбрать</option>
                        <?php foreach ($films as $film):?>
                            <option value="<?=$film['id_film'];?>"><?=$film['film_name'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="publish" value="1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Опубликован?
                    </label>
                </div>
                <input  type="submit" name="edit-overview" class="btn-submit  btn header-second-user--login" value="Добавить">

            </form>
        </section>
    </div>

</main>
<?php include ('../../app/includes/footer.php')?>
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="/assets/js/modal.js"></script>
<script src="/assets/js/burger.js"></script>
<script src="/assets/js/ckeditor.js"></script>

</body>
</html>
