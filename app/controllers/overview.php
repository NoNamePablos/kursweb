<?php
include "../../app/helpers/path.php";

$isSubmit=false;
$errMsg='';
$users_admin=selectAll('users');
$films=selectAll('films');
$ROOT__PATH_FOR_FILMS=realpath("../../");
$overviewAdm=selectAll('film_overview');

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['create-overview'])){

    if(!empty($_FILES['over-prev']['name'])){
        $film_prev_name=time()."_".$_FILES['over-prev']['name'];
        $film_prev_TMPname=$_FILES['over-prev']['tmp_name'];
        $destintaiton = $ROOT__PATH_FOR_FILMS.'\assets\uploads\\'. $film_prev_name;
        $res= move_uploaded_file($film_prev_TMPname, $destintaiton);
        if($res){
            $_POST['over-prev']=$film_prev_name;
        }else{
            $errMsg="Уккщк";
        }
    }else{
        $errMsg="Уккщк1";
    }
    $title=trim($_POST['over-titles']);
    $content=trim($_POST['over-content']);
    $id_film=trim($_POST['over-selected']);
    $publish=isset($_POST['publish'])?1 :0;

    if($title===""||$content===""){
        $errMsg="Не все поля заполнены !";
    }elseif(mb_strlen($title,'UTF8')<5){
        $errMsg="Пост не может быть меньше 5-х символов!ы";
    }
    else{
        $arrData=[
            'title'=>$title,
            'content'=>$content,
            'id_film'=>$id_film,
            'status'=>$publish,
            'id_user'=>$_SESSION['id'],
            'img'=>$_POST['over-prev'],
        ];
        $id_overview=insert('film_overview',$arrData);
        header('location: '.BASE_URL . 'admin/overview/index.php');

    }


//$lastRow=selectOne('users',['id'=>$id]);
}else{
    $title='';
    $content='';
}
//получение на стр данных при редактировании
if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['edit_id'])){
    $user=selectOne('film_overview',['id'=>$_GET['edit_id']]);
    $id_overview=$user['id'];
    $title=$user['title'];
    $content=$user['content'];
}

//Обновление

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['edit-overview'])){

    if(!empty($_FILES['over-prev']['name'])){
        $film_prev_name=time()."_".$_FILES['over-prev']['name'];
        $film_prev_TMPname=$_FILES['over-prev']['tmp_name'];
        $destintaiton = $ROOT__PATH_FOR_FILMS.'\assets\uploads\\'. $film_prev_name;
        $res= move_uploaded_file($film_prev_TMPname, $destintaiton);
        if($res){
            $_POST['over-prev']=$film_prev_name;
        }else{
            $errMsg="Уккщк";
        }
    }else{
        $errMsg="Уккщк1";
    }
    $id=trim($_POST['id']);
    $title=trim($_POST['over-titles']);
    $content=trim($_POST['over-content']);
    $id_film=trim($_POST['over-selected']);
    $publish=isset($_POST['publish'])?1 :0;

    if($title===""||$content===""){
        $errMsg="Не все поля заполнены !";
    }elseif(mb_strlen($title,'UTF8')<5){
        $errMsg="Пост не может быть меньше 5-х символов!ы";
    }
    else{
        $arrData=[
            'title'=>$title,
            'content'=>$content,
            'id_film'=>$id_film,
            'status'=>$publish,
            'id_user'=>$_SESSION['id'],
            'img'=>$_POST['over-prev'],
        ];
        update('film_overview',$id,$arrData);
        header('location: '.BASE_URL . 'admin/overview/index.php');

    }
}
//удаление из админки
if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    delete('film_overview',$id);
    header('location: '. BASE_URL . 'admin/overview/index.php');
}


if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['pub_id'])){
    $id=$_GET['pub_id'];
    $status=$_GET['publish'];
    update('film_overview',$id,['status'=>$status]);
    header('location: '. BASE_URL . 'admin/overview/index.php');
}
/*if($_SERVER['REQUEST_METHOD']==='GET'&&isset($_GET['id'])){
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

