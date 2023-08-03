<?php
function connectDb(){
        // Connexion à la base de données
        try{
            $database = new PDO('mysql:host=localhost;dbname=blogdeb;charset=utf8', 'root', '');
        }
        catch(Exception $e){
              die( 'Erreur : '.$e->getMessage()   );
        }
        return $database;
}

function getPosts(){

    $database = connectDb();
    // On récupère les 5 derniers billets
    $sql = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY date_creation DESC LIMIT 0, 5' ;
    $statement = $database->prepare($sql);
    $statement->execute();

    $posts=[];
    
    while ($data = $statement->fetch())
       {
        //récupérer les résultats de la requête dans un tableau associatif
         $post = [
             'title' => $data['titre'],
             'fr_creation_date' => $data['date_creation_fr'],
             'content' => $data['contenu'],
             'id' =>$data['id']
         ];
    
         $posts[] = $post;
       }
    return $posts;
}

function getPost($identifier){
    $database = connectDb();

    $statement = $database->prepare("SELECT * FROM posts WHERE id =?");
    $statement->execute([$identifier]);
    
    $data = $statement->fetch();

    return $data;
}
