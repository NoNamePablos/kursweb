<?php
include '../../app/helpers/path.php';
include '../../app/Database/db.php';
include '../../app/controllers/users.php';
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
    <div class="admin-wrapper">
        <?php
        include "../../app/includes/admin_sidebar.php";?>

        <section class="admin-table--wrapper">
            <div class="admin-table--manage">
                <a href="<?=BASE_URL.'admin/users/create.php';?>" class="admin-table--manage_btn btn btn-warning">Add film</a>
                <a href="<?=BASE_URL.'admin/users/index.php';?>" class="admin-table--manage_btn btn btn-success">Manage films</a>
            </div>
            <table class="admin-table table align-middle">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Логин</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Возраст</th>
                    <th scope="col">Управление</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users_admin as $key=>$user_admin):?>
                <tr>


                    <th scope="row"><?=$user_admin['id'];?></th>
                    <td><?=$user_admin['username'];?></td>
                    <td class="admin-table__description">
                        <p>
                            <?=$user_admin['email'];?>
                        </p>
                    </td>
                    <?php if($user_admin['admin']==1):?>
                    <td>Админ</td>
                    <?php else: ?>
                    <td>Пользователь</td>
                    <?php endif; ?>
                    <td><?=$user_admin['age']?></td>
                    <td class="admin-table-control">
                        <a class="admin-table-control_btn btn-primary" href="edit.php?edit_id=<?=$user_admin['id'];?>">edit</a>
                        <a class="admin-table-control_btn btn-danger" href="index.php?delete_id=<?=$user_admin['id'];?>">delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </section>
    </div>

</main>
<?php include ('../../app/includes/footer.php')?>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="/assets/js/swiper.js"></script>
<script src="/assets/js/modal.js"></script>
<script src="/assets/js/burger.js"></script>
</body>
</html>
