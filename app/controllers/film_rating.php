<?php
include "../../app/helpers/path.php";
include "../../app/Database/db.php";
if (isset($_POST['action'])) {
    global  $pdo;
    $id_film = $_POST['id_film'];
    $action = $_POST['action'];
    switch ($action){
        case 'like':
            insertRating('films_rating',['id_film'=>$id_film,'id_user'=>$_SESSION['id'],'rating_action'=>$action]);
            break;
        case 'dislike':
            insertRating('films_rating',['id_film'=>$id_film,'id_user'=>$_SESSION['id'],'rating_action'=>$action]);
            break;
        case 'unlike':
            unInsertRataing('films_rating',$_SESSION['id'],$id_film);
            break;
         case 'undislike':
             unInsertRataing('films_rating',$_SESSION['id'],$id_film);
             break;
        default:
            break;
    }

    echo getRating($id_film);
    exit(0);
}
