<?php
require('connect.php');

function showArr($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

//БД чекер на ошибку
function dbCheckError($query){
    $errInfo=$query->errorInfo();
    if($errInfo[0]!=PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}
//Получить все данные из таблицы
function selectAll($table,$params=[]){
    global $pdo;
    $sql="SELECT * From $table";
    if(!empty($params)){
        $i=0;
        foreach ($params as $key=>$value){
            if(!is_numeric($value)){
                $value="'".$value."'";
            }
            if($i===0){
                $sql=$sql . " WHERE $key=$value";
            }else{
                $sql=$sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//Выборка 1 записи

function selectOne($table,$params=[]){
    global $pdo;
    $sql="SELECT * From `$table`";
    if(!empty($params)){
        $i=0;
        foreach ($params as $key=>$value){
            if(!is_numeric($value)){
                $value="'".$value."'";
            }
            if($i===0){
                $sql=$sql . " WHERE $key=$value";
            }else{
                $sql=$sql . " AND $key=$value";
            }
            $i++;
        }
    }
    $sql=$sql." LIMIT 1";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

function insert($table,$params=[]){
    /*
 * INSERT INTO `users` (`id`, `admin`, `username`, `password`, `email`, `created`, `age`) VALUES (NULL, '0', 'test', 'test', 'test@mail.ru', CURRENT_TIMESTAMP, '17');
 * */
    global  $pdo;
    $i=0;
    $coll='';
    $mask='';

    foreach ($params as $key =>$value){
       if($i===0){
           $coll=$coll ."$key";
           $mask=$mask."'"."$value"."'";
       }else{
           $coll=$coll .", $key";
           $mask=$mask.", '"." $value"."'";
       }

        $i++;
    }
    $sql="INSERT INTO $table ($coll) VALUES($mask)";
    $query=$pdo->prepare($sql);

    $query->execute($params);
    dbCheckError($query);
    return  $pdo->lastInsertId();
}
function update($table,$id,$params){
    global  $pdo;
    $i=0;
    $str='';

    foreach ($params as $key =>$value){
        if($i===0){
            $str=$str. $key ." = '".$value."'";
        }else{

            $str=$str. ", ".$key ." = '".$value."'";
        }

        $i++;
    }
    $sql="UPDATE $table SET $str WHERE id = $id ";

    $query=$pdo->prepare($sql);

    $query->execute($params);
    dbCheckError($query);

}

function delete($table,$id){
    global  $pdo;
    $sql="DELETE FROM $table WHERE id = $id";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

}

$arrData=[
    'admin'=>'0',
    'username'=>'raideee1',
    'password'=>'232133213',
    'email'=>'12312222@mail.ru',
    'age'=>'22',
];
