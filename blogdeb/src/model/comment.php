<?php
require_once 'src/model.php';

function getComments($identifier){
    $database = connectDb();
    
    $sql=sprintf("SELECT * FROM comment WHERE id_post=%u ORDER BY date_creation DESC " ,$identifier);
    $statement=$database->prepare($sql);
    $statement->execute();

    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $comments;
}

function createComment(string $post, string $author, string $comment){
    $database = connectDb();

    $sql=sprintf("INSERT INTO comment(id_post,author,comment) VALUES (%s,'%s','%s')",$post,$author,$comment);
    $statement = $database->prepare($sql);
    
    $affectedLines=$statement->execute();
    return $affectedLines>0;
}
