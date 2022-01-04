<?php
include "../Database/db.php";

if(isset($_GET['offset'])&&isset($_GET['limit'])){
    $offset=$_GET['offset'];
    $limit=$_GET['limit'];
    $films=selectAllFromFilmsWitUsersWithStatusIndex('films','users',$limit,$offset);
    echo json_encode($films);
    exit();
}
?>