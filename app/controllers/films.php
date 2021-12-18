<?php

$isSubmit=false;
$errMsg='';
$users_admin=selectAll('users');
//Авторизация в админке
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['add_film'])){

    $title=trim($_POST['film_name']);
    $descr=trim($_POST['film_description']);
    $acters=trim($_POST['film_acters']);
    $preview=trim($_POST['film_preview']);
    $world_money=trim($_POST['film_world_money']);
    $rus_money=trim($_POST['film_rus_money']);
    $year=trim($_POST['film_year']);
    $genres=trim($_POST['film_genres']);
    $admin=0;
    showArr($_POST);
    exit();
    /*if($login===""||$email===""||$passwordSecond===""||$passwordFirst===""){
        $errMsg="Не все поля заполнены !";
    }elseif(mb_strlen($login,'UTF8')<2){
        $errMsg="Логин не может быть меньше 2-х символов!ы";
    }elseif($passwordFirst!==$passwordSecond){
        $errMsg="Не правильные пароли!";
    }
    else{
        $checkMail=selectOne('users',['email'=>$email]);
        $checkLogin=selectOne('users',['username'=>$login]);

        if($checkMail['email']===$email){
            $errMsg="Эта почта уже зарегистрирована!";
        }elseif($checkLogin['username']===$login){
            $errMsg="Этот логин уже используется!";
        }else{
            $password=password_hash($_POST['password-second'],PASSWORD_DEFAULT);
            if(isset($_POST['admin']))$admin=1;
            $arrData=[
                'admin'=>$admin,
                'username'=>$login,
                'password'=>$password,
                'email'=>trim($email),
            ];
            $id=insert('users',$arrData);
            $isSubmit=true;
            header('location: '.BASE_URL . 'admin/films/index.php');
        }

    }*/

//$lastRow=selectOne('users',['id'=>$id]);
}else{
    $login='';
    $email='';


}
/*//Авторизация в админке
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['create-user'])){

    $login=trim($_POST['login']);
    $email=trim($_POST['email']);
    $passwordSecond=trim($_POST['password-second']);
    $passwordFirst=trim($_POST['password-first']);
    $admin=0;
    if($login===""||$email===""||$passwordSecond===""||$passwordFirst===""){
        $errMsg="Не все поля заполнены !";
    }elseif(mb_strlen($login,'UTF8')<2){
        $errMsg="Логин не может быть меньше 2-х символов!ы";
    }elseif($passwordFirst!==$passwordSecond){
        $errMsg="Не правильные пароли!";
    }
    else{
        $checkMail=selectOne('users',['email'=>$email]);
        $checkLogin=selectOne('users',['username'=>$login]);

        if($checkMail['email']===$email){
            $errMsg="Эта почта уже зарегистрирована!";
        }elseif($checkLogin['username']===$login){
            $errMsg="Этот логин уже используется!";
        }else{
            $password=password_hash($_POST['password-second'],PASSWORD_DEFAULT);
            if(isset($_POST['admin']))$admin=1;
            $arrData=[
                'admin'=>$admin,
                'username'=>$login,
                'password'=>$password,
                'email'=>trim($email),
            ];
            $id=insert('users',$arrData);
            $isSubmit=true;
            header('location: '.BASE_URL . 'admin/films/index.php');
        }

    }

//$lastRow=selectOne('users',['id'=>$id]);
}else{
    $login='';
    $email='';


}*/
//Удаление через админку
if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    delete('films',$id);
    header('location: '. BASE_URL . 'admin/films/index.php');
}



//   $password=password_hash($_POST['password-second'],PASSWORD_DEFAULT);
/*$id=insert('users',$arrData);
$lastRow=selectOne('users',['id'=>$id]);*/

