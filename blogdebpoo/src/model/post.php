<?php

namespace App\Model\Post;
use App\lib\db\DbConnection;

require_once 'src/lib/db.php';

class Post
{
    public string $id;
    public string $title;
    public string $content;
    public string $dateCreation;

}


class PostRepository
{
    /**
     * cette propriété représente la connecion à la base
     * utilise la classe DbConnection et la méthode getConnection() pour se connecter à la base si besoin
     * */

    public DbConnection $connection;
    /**
     * comme one a défini un namespace,
     *  on met un ' \ ' à Dbconnection pour car il se trouve à la racine(namespace global)
    */



    public function getPost($identifier): Post
    {
        $dbConnect=$this->connection->getConnection();
        $statement = $dbConnect->prepare("SELECT * FROM posts WHERE id =?");
        $statement->execute([$identifier]);
        
        $data = $statement->fetch();
    
        $post = new Post();
        $post->title = $data['titre'];
        $post->dateCreation = $data['date_creation'];
        $post->content = $data['contenu'];
        $post->id = $data['id'];
    
        return $post;
    }

    public function getPosts(): Array
    {
        $dbConnect=$this->connection->getConnection();

        // On récupère les 5 derniers billets
        $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr ';
        $sql .='FROM posts ORDER BY date_creation DESC LIMIT 0, 5';

        $statement = $dbConnect->prepare($sql);
        $statement->execute();
    
        $posts=[];
        
        while ($data = $statement->fetch())
           {
            $post = new Post();
            $post->title = $data['titre'];
            $post->dateCreation = $data['date_creation_fr'];
            $post->content = $data['contenu'];
            $post->id = $data['id'];
    
             $posts[] = $post;
           }
        return $posts;
    }
}



