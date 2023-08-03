<?php
require_once 'src/lib/db.php';
require_once 'src/model/post.php';
require_once 'src/model/comment.php';

//pour éviter d'ecrire le préfixe namespace à chaque utilisation de classe contenu dans le namespace
use App\Model\Post\PostRepository;
use App\lib\db\DbConnection;
use App\Model\Comment\CommentRepository;

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
    $postRepo = new PostRepository();
    $postRepo->connection = new DbConnection();
    $post = $postRepo->getPost($identifier);

    $commRepo = new CommentRepository();
    $commRepo->connection = new DbConnection();
    $comments = $commRepo->getComments($identifier);
    
    require 'templates/post.php';
}
