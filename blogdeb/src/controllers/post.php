<?php
require_once 'src/model.php';
require_once 'src/model/comment.php';

/** Cette partie est déplacé dans le routeur index.php

if(isset($_GET['id']) && $_GET['id'] > 0)
{
    $id = $_GET['id'];
} else
{
    echo 'Erreur : aucun identifiant de post envoyé';
    die;
}
*/

function viewPost(string $identifier){
    $post = getPost($identifier);
    $comments = getComments($identifier);
    
    require 'templates/post.php';
}
