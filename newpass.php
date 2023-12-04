<?php include ('app/helpers/path.php');
include 'app/Database/db.php';
include 'app/controllers/users.php';


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
    <div class="reset-container">
        <h1>Востановление пароля</h1>
        <form action="newpass.php" method="get" class="reset-form" ">
        <input type="hidden" name="key" value="<?php echo $_GET['key']?>">
            <div class="header-second--search input input-setting">
                <input type="text" name="password" class="input-setting-field" placeholder="Введите новый пароль" value="">
            </div>
            <input type="submit" name="btn-reset" class="btn-submit btn header-second-user--login" placeholder=">Востановить">
        </form>
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