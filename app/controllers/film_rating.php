<?php
include "../../app/helpers/path.php";
include "../../app/Database/db.php";
if (isset($_POST['action'])) {
    global  $pdo;
    $id_film = $_POST['id_film'];
    $action = $_POST['action'];
    insertRating('films_rating',['id_film'=>$id_film,'id_user'=>$_SESSION['id'],'rating_action'=>$action]);
    echo getRating($id_film);
    exit(0);
}
