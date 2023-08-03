<?php
use App\Model\Post\PostRepository;
use App\lib\db\DbConnection;
use App\Model\Comment\CommentRepository;


require_once 'src/lib/db.php';
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


    $commRepo = new CommentRepository();
    $commRepo->connection=new DbConnection();
    $succes = $commRepo->createComment($post, $author, $comment);
    if(!$succes) {
        throw new Exception('impossible d\'ajouter le commentaire!');
    } else {
        header('Location: index.php?action=post&id='.$post);
    }
}
