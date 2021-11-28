<?php
$driver='mysql';
$host = 'localhost';
$db_name = 'filmlib';
$db_user = 'root';
$db_pass = 'mysql';
$db_charset='utf8';
$options =[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION];

try{
    $pdo=new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$db_charset",$db_user,$db_pass,$options
    );

}catch (PDOException $i){
    die("Ошибка подключения к базе данных");
}
