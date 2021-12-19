<?php
include '../../app/helpers/path.php';
if(!$_SESSION){
    header('location: '.BASE_URL.'logout.php');
}
$isSubmit=false;
$errMsg='';
$users_admin=selectAll('users');
$films=selectAll('films');
$ROOT__PATH_FOR_FILMS=realpath("../../");
$filmsAdm=selectAllFromFilmsWitUsers('films','users');
if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['add_film'])){

    if(!empty($_FILES['film_preview']['name'])){
        $film_prev_name=time()."_".$_FILES['film_preview']['name'];
        $film_prev_TMPname=$_FILES['film_preview']['tmp_name'];
        $destintaiton = $ROOT__PATH_FOR_FILMS.'\assets\uploads\\'. $film_prev_name;
        $res= move_uploaded_file($film_prev_TMPname, $destintaiton);
        if($res){
            $_POST['film_preview']=$film_prev_name;
        }else{
            $errMsg="Уккщк";
        }
    }else{
        $errMsg="Уккщк1";
    }
    if(!empty($_FILES['film_video']['name'])){
        $film_prev_name=time()."_".$_FILES['film_video']['name'];
        $film_prev_TMPname=$_FILES['film_video']['tmp_name'];
        $destintaiton = $ROOT__PATH_FOR_FILMS.'\\assets\\uploads\\'. $film_prev_name;
        $res= move_uploaded_file($film_prev_TMPname, $destintaiton);
        if($res){
            $_POST['film_video']=$film_prev_name;
        }else{
            $errMsg="Уккщк";
        }
    }else{
        $errMsg="Уккщк1";
    }
    $title=trim($_POST['film_name']);
    $descr=trim($_POST['film_description']);
    $acters=trim($_POST['film_acters']);
    $preview=trim($_POST['film_preview']);
    $world_money=trim($_POST['film_world_money']);
    $rus_money=trim($_POST['film_rus_money']);
    $year=trim($_POST['film_year']);
    $genres=trim($_POST['film_genres']);
    $director=trim($_POST['film_director']);
    $film_contry=trim($_POST['film_country']);
    $publish=isset($_POST['publish'])?1 :0;
    if($title===""||$descr===""||$acters===""||$genres===""){
        $errMsg="Не все поля заполнены !";
    }elseif(mb_strlen($title,'UTF8')<2){
        $errMsg="Логин не может быть меньше 2-х символов!ы";
    }
    else{
        $arrData=[
            'film_year'=>$year,
            'film_country'=>$film_contry,
            'film_genres'=>$genres,
            'film_time'=>120,
            'film_preview'=>$_POST['film_preview'],
            'film_video'=>$_POST['film_video'],
            'film_director'=>$director,
            'film_acters'=> $acters,
            'film_description'=>$descr,
            'film_name'=>$title,
            'film_world_money'=>(int)$world_money,
            'film_rus_money'=>(int)$rus_money,
            'status'=>$publish,
            'id_user'=>$_SESSION['id']

        ];
        $id=insert('films',$arrData);
        header('location: '.BASE_URL . 'admin/films/index.php');

    }


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


if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['id'])){
    $films=selectOne('films',['id_film'=>$_GET['id']]);
    $id=$films['id_film'];
    $title=$films['film_name'];
    $descr=$films['film_description'];
    $acters=$films['film_acters'];
    $preview=$films['film_preview'];
    $world_money=$films['film_world_money'];
    $rus_money=$films['film_rus_money'];
    $year=$films['film_year'];
    $genres=$films['film_genres'];
    $director=$films['film_director'];
    $film_contry=$films['film_country'];
    $publish=$films['publish'];

}
if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['pub_id'])){
    $id=$_GET['pub_id'];
    $status=$_GET['publish'];
    updateFilms('films',$id,['status'=>$status]);
    header('location: '. BASE_URL . 'admin/films/index.php');
}

if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['edit_film'])){
    if(!empty($_FILES['film_preview']['name'])){
        $film_prev_name=time()."_".$_FILES['film_preview']['name'];
        $film_prev_TMPname=$_FILES['film_preview']['tmp_name'];
        $destintaiton = $ROOT__PATH_FOR_FILMS.'\assets\uploads\\'. $film_prev_name;
        $res= move_uploaded_file($film_prev_TMPname, $destintaiton);
        if($res){
            $_POST['film_preview']=$film_prev_name;
        }else{
            $errMsg="Уккщк";
        }
    }else{
        $errMsg="Уккщк1";
    }
    if(!empty($_FILES['film_video']['name'])){
        $film_prev_name=time()."_".$_FILES['film_video']['name'];
        $film_prev_TMPname=$_FILES['film_video']['tmp_name'];
        $destintaiton = $ROOT__PATH_FOR_FILMS.'\\assets\\uploads\\'. $film_prev_name;
        $res= move_uploaded_file($film_prev_TMPname, $destintaiton);
        if($res){
            $_POST['film_video']=$film_prev_name;
        }else{
            $errMsg="Уккщк";
        }
    }else{
        $errMsg="Уккщк1";
    }
    $id_film=trim($_POST['id']);
    $title=trim($_POST['film_name']);
    $descr=trim($_POST['film_description']);
    $acters=trim($_POST['film_acters']);
    $preview=trim($_POST['film_preview']);
    $world_money=trim($_POST['film_world_money']);
    $rus_money=trim($_POST['film_rus_money']);
    $year=trim($_POST['film_year']);
    $genres=trim($_POST['film_genres']);
    $director=trim($_POST['film_director']);
    $film_contry=trim($_POST['film_country']);
    $publish=isset($_POST['publish'])?1 :0;
    if($title===""||$descr===""||$acters===""||$genres===""){
        $errMsg="Не все поля заполнены !";
    }elseif(mb_strlen($title,'UTF8')<2){
        $errMsg="Логин не может быть меньше 2-х символов!ы";
    }
    else{
        $arrData=[
            'film_year'=>$year,
            'film_country'=>$film_contry,
            'film_genres'=>$genres,
            'film_time'=>120,
            'film_preview'=>$_POST['film_preview'],
            'film_video'=>$_POST['film_video'],
            'film_director'=>$director,
            'film_acters'=> $acters,
            'film_description'=>$descr,
            'film_name'=>$title,
            'film_world_money'=>(int)$world_money,
            'film_rus_money'=>(int)$rus_money,
            'status'=>$publish,
            'id_user'=>$_SESSION['id']

        ];
        showArr($id_film);
        showArr($arrData);

        updateFilms('films',$id_film,$arrData);
        header('location: '.BASE_URL . 'admin/films/index.php');
    }

}



//Удаление через админку
if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    deleteFilms('films',$id);
    header('location: '. BASE_URL . 'admin/films/index.php');
}



//   $password=password_hash($_POST['password-second'],PASSWORD_DEFAULT);
/*$id=insert('users',$arrData);
$lastRow=selectOne('users',['id'=>$id]);*/

