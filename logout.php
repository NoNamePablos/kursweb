<?php
session_start();
include 'app/helpers/path.php';
unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['admin']);
unset($_SESSION['favourites']);

header('location: /');
