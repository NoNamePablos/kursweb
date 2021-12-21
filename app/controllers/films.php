<?php
include "../../app/helpers/path.php";

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
    $top=isset($_POST['film_top'])?1:0;
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
            'id_user'=>$_SESSION['id'],
            'film_top'=>$top

        ];
        $id=insert('films',$arrData);
        header('location: '.BASE_URL . 'admin/films/index.php');

    }


//$lastRow=selectOne('users',['id'=>$id]);
}else{
    $login='';
    $email='';


}




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
    $top=$films['film_top'];

}
function mail_utf8($to, $from_user, $from_email,
                   $subject = '(No subject)', $message = '')
{
    $from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
    $subject = "=?UTF-8?B?".base64_encode($subject)."?=";

    $headers = "From: $from_user <$from_email>\r\n".
        "MIME-Version: 1.0" . "\r\n" .
        "Content-type: text/html; charset=UTF-8" . "\r\n";

    return mail($to, $subject, $message, $headers);
}

//
if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['pub_id'])){
    $id=$_GET['pub_id'];
    $status=$_GET['publish'];
    $film=selectOne('films',['id_film'=>$id]);
    updateFilms('films',$id,['status'=>$status]);
    if($status==1){
        $usersAll=selectAll('users');
        foreach ($usersAll as $user){
            mail_utf8($user['email'],
                'test123mail12311@mail.ru',
                'test123mail12311@mail.ru',
                "added new film",
                'Новый фильм уже на сайте '.$film['film_name']
            );
        }
    }
    header('location: '. BASE_URL . 'admin/films/index.php');
}

if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['status_id'])){
    $id=$_GET['status_id'];
    $status=$_GET['top'];
    $film=selectOne('films',['id_film'=>$id]);
    updateFilms('films',$id,['film_top'=>$status]);
    header('location: '. BASE_URL . 'admin/films/index.php');
}

if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['pub_id'])){
    $id=$_GET['pub_id'];
    $status=$_GET['publish'];
    $film=selectOne('films',['id_film'=>$id]);
    updateFilms('films',$id,['status'=>$status]);
    if($status==1){
    $usersAll=selectAll('users');
    foreach ($usersAll as $user){
        mail_utf8($user['email'],
            'test123mail12311@mail.ru',
            'test123mail12311@mail.ru',
            "added new film",
            'Новый фильм уже на сайте '.$film['film_name']
        );
    }
    }
    header('location: '. BASE_URL . 'admin/films/index.php');
}

//Добавить в избранное
if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['fav'])){

    $fav_id = $_GET['fav'];
    if (!isset($_SESSION['favourites'])) {
        $fav_array = array();
        $_SESSION['favourites'] = $fav_array;
    }
    array_push($_SESSION['favourites'], $fav_id);
    header('location: '.BASE_URL.'detalnaya.php?film='.$fav_id);
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
    $top=isset($_POST['film_top'])?1 :0;
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
            'id_user'=>$_SESSION['id'],
            'film_top'=>$top
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
if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['deletefav_id'])){

    foreach ($_SESSION['favourites'] as $item){

        foreach ($_SESSION['favourites'] as $key => $value){
            if ($value == $_GET['deletefav_id']) {
                unset($_SESSION['favourites'][$key]);
            }
        }
   }
}
//   $password=password_hash($_POST['password-second'],PASSWORD_DEFAULT);
/*$id=insert('users',$arrData);
$lastRow=selectOne('users',['id'=>$id]);*/

