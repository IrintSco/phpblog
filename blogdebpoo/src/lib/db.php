<?php
namespace App\lib\db ;

class DbConnection
{
    public ?\PDO $database = null;

    public function getConnection(): \PDO
    {
        if($this->database === null){
            $this->database = new \PDO('mysql:host=localhost;dbname=blogdeb;charset=utf8', 'root', '');
        }

        return $this->database;
    }
}
/**
 * comme la méthode getConnection() retourne la propriété database, elle sera appelée lors d'exécution de requête sql
 * à la place de la méthode habituelle (l'utilisation d'une variable enregistrant la connexion à la base)
 */

 /** Connection standard
  function dbConnect(){
    $database = new PDO('mysql:host=localhost;dbname=blogdeb;charset=utf8', 'root', '');
    return $database;
}
*/
