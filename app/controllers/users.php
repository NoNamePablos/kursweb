<?php

$isSubmit=false;
$errMsg='';
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['btn-reg'])){
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
            $arrData=[
                'admin'=>0,
                'username'=>$login,
                'password'=>$password,
                'email'=>trim($email),
            ];
            $id=insert('users',$arrData);
            $isSubmit=true;
            $user=selectOne('users',['id'=>$id]);
            $_SESSION['id'] = $user['id'];
            $_SESSION['login']=$user['username'];
            $_SESSION['admin']=$user['admin'];

            if($_SESSION['admin']){
                header('location: /' . 'admin/admin.php');
            }else {
                header('location: /');
            }
        }

   }

//$lastRow=selectOne('users',['id'=>$id]);
}else{
$login='';
$email='';


}
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['btn-log'])){
    $emails=trim($_POST['email']);
    $passwordS=trim($_POST['password']);
    showArr($emails);
    if($emails===""||$passwordS===""){
        $errMsg="Не все поля заполнены 111!";
    }else{
    $checkAuthMail=selectOne('users',['email'=>$emails]);
    $errMsg="test!";
    if($checkAuthMail && password_verify($passwordS,$checkAuthMail['password'])){
        $_SESSION['id']=$checkAuthMail['id'];
        $_SESSION['login']=$checkAuthMail['username'];
        $_SESSION['admin']=$checkAuthMail['admin'];

        if($_SESSION['admin']){
            header('location: /' . 'admin/admin.php');
        }else{
        header('location: /' );
        }
    }else{
        //ошибка авторизации
        $errMsg= 'Почта либо пароль неверный!';
    }
    }
}else{
    $emails='';
}
   //   $password=password_hash($_POST['password-second'],PASSWORD_DEFAULT);
    /*$id=insert('users',$arrData);
    $lastRow=selectOne('users',['id'=>$id]);*/

