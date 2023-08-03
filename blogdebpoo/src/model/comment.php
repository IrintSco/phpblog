<?php
namespace App\Model\Comment;

use App\lib\db\DbConnection;

require_once 'src/lib/db.php';

class Comment
{
    public string $author;
    public string $dateCreation;
    public string $comment;
    public string $id;
    public string $idPost;
}


class CommentRepository{
    public DbConnection $connection;

    //get tous les commentaires d'un post
    public function getComments($identifier): array
    {
        $database = $this->connection->getConnection();
        $sql=sprintf("SELECT * FROM comment WHERE id_post=%u ORDER BY date_creation DESC " ,$identifier);
        $statement=$database->prepare($sql);
        $statement->execute();

        $comments = [];
        while ($data = $statement->fetch()){
            $comment = new Comment();
            $comment->author = $data['author'];
            $comment->dateCreation = $data['date_creation'];
            $comment->comment = $data['comment'];
            $comment->id = $data['id'];
            $comment->idPost = $data['id_post'];

            $comments[]=$comment;
        }
        return $comments;
    }

    //get un comment
    public function getComment($identifier): Comment
    {
        $database = $this->connection->getConnection();
        $sql=sprintf("SELECT * FROM comment WHERE id=%u" ,$identifier);
        $statement=$database->prepare($sql);
        $statement->execute();

        $data = $statement->fetch();

        $comment = new Comment();
        $comment->author = $data['author'];
        $comment->dateCreation = $data['date_creation'];
        $comment->comment = $data['comment'];
        $comment->id = $data['id'];
        $comment->idPost = $data['id_post'];

        return $comment;
    }


    //create commentaires
    public function createComment(string $post, string $author, string $comment){
            $database = $this->connection->getConnection();

            $sql=sprintf("INSERT INTO comment(id_post,author,comment) VALUES (%s,'%s','%s')",$post,$author,$comment);
            $statement = $database->prepare($sql);
            
            $affectedLines=$statement->execute();

            return $affectedLines>0;
        }

    //updtae commentaire
    public function updateComment($idComment, $comment){
        $database = $this->connection->getConnection();

        $sql=sprintf("UPDATE comment SET comment='%s' WHERE id=%u",$comment, $idComment);
        
        $statement = $database->prepare($sql);
            
        $affectedLines=$statement->execute();

        return $affectedLines>0;

    }
}

