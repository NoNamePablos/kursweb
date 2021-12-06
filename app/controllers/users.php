<?php
$isSubmit=false;
$errMsg='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $login=trim($_POST['login']);
    $email=trim($_POST['email']);
    $passwordSecond=trim($_POST['password-second']);
    $passwordFirst=trim($_POST['password-first']);
    $admin=0;
    if($login===""||$email===""||$passwordSecond===""||$passwordFirst===""){
        $errMsg="Не все поля заполнены !";
        echo $errMsg;
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
                'admin'=>$admin,
                'username'=>$login,
                'password'=>$password,
                'email'=>$email,
            ];
            $id=insert('users',$arrData);
            $isSubmit=true;

        }

   }

//$lastRow=selectOne('users',['id'=>$id]);
}else{
$login='';
$email='';


}
   //   $password=password_hash($_POST['password-second'],PASSWORD_DEFAULT);
    /*$id=insert('users',$arrData);
    $lastRow=selectOne('users',['id'=>$id]);*/

