<?php

use App\Model\Post\PostRepository;
use App\Model\Comment\CommentRepository;
use App\lib\db\DbConnection;

require_once 'src/model/comment.php';

function viewComment($identifier){
    $comRepo = new CommentRepository();
    $comRepo->connection = new DbConnection();
    $comment = $comRepo->getComment($identifier);

    require 'templates/edit_comment.php';
}

function updateComm(array $input)
{
    $idComment=null;
    $idPost=null;
    $comment =null;
    if(!empty($input['comment'])){
        $comment = $input['comment'];
        $idComment = $input['idComment'];
        $idPost = $input['idPost'];
    }
    else {
        throw new Exception('Le commentaire que vous avez saisi est vide.');
    }

    $commRepo = new CommentRepository();
    $commRepo->connection=new DbConnection();
    $succes = $commRepo->updateComment($idComment, $comment);
    if(!$succes) {
        throw new Exception('impossible de modifier le commentaire!');
    } else {
        header('Location: index.php?action=post&id='.$idPost);
    }
}