<?php
include "../../app/helpers/path.php";
include "../../app/Database/db.php";
if (isset($_POST['text'])) {
    global  $pdo;
    $id_film = $_POST['id_film'];
    $id_user = $_POST['id_user'];
    $text=trim($_POST['text']);
    $data=[
        'id_film'=>$id_film,
        'id_user'=>$id_user,
        'text'=>$text
        ];
    $lastId=insert('film_comments',$data);
    $comment=selectLastComment('film_comments','users',$lastId);
    echo json_encode($comment);
   /* echo $lastId;*/
    exit(0);
}