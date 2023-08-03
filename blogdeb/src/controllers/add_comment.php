<?php

require_once 'src/model/comment.php';

function addComment(string $post, array $input)
{
    $author=null;
    $comment=null;
    if(!empty($input['author']) && !empty($input['comment'])){
        $author = $input['author'];
        $comment = $input['comment'];
    } else {
        throw new Exception('les données du formulaires sont invalides.');
    }

    $succes = createComment($post, $author, $comment);
    if(!$succes) {
        throw new Exception('impossible d\'ajouter le commentaire!');
    } else {
        header('Location: index.php?action=post&id='.$post);
    }
}