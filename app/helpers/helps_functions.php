<?php
include "../../app/helpers/path.php";
include "../../app/Database/db.php";
function calcRating($id_film){
    $score = getSumVotes($id_film) * ( getLikes($id_film) / getSumVotes($id_film) );
    return $score;
}
function getSumVotes($id_film){
    return getLikes($id_film)+getDislikes($id_film);
}