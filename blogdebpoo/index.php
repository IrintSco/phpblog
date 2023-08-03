<?php
/**
 * index.php sert de routeur
 * il reçcoit toutes les requêtes et les route vers le bon controleur
 */


/**
 * chager les fichiers contrôleurs
 * tester le paramètres "action" pour savoir quel controleur appeler
 * si "action" absnet, charger le controleur de la page d'accueil
 */

 //chargement des fichiers controleur
require_once 'src/controllers/homepage.php';
require_once 'src/controllers/post.php';
require_once 'src/controllers/add_comment.php';
require_once 'src/controllers/edit_comment.php';

//test du paramètre 'action'

try{
    if (isset($_GET['action']) && $_GET['action'] !== '')
    {
        if ($_GET['action']==='post')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $identifier = $_GET['id'];
                viewPost($identifier);
            } else{
                throw new Exception('aucun identifiant de post envoyé');
            }
        } elseif($_GET['action'] === 'addComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $identifier = $_GET['id'];

                addComment($identifier, $_POST);

            } else {
                throw new Exception('aucun identifiant de post envoyé');
            }
        } elseif($_GET['action']==='editComment'){
            if (isset($_GET['idComment']) && $_GET['idComment'] > 0){
             
                $idComment = $_GET['idComment'];
                viewComment($idComment);
            } else {
                throw new Exception('aucun identifiant de commentaire envoyé');
            }
        }elseif($_GET['action']==='updateComment'){
            if (isset($_POST['idPost']) && $_POST['idPost'] > 0){
                
                updateComm($_POST);
            } else {
                throw new Exception('aucun identifiant de commentaire envoyé');
            }
        }
        else
        {
            throw new Exception('page introuvable');
        }
    }
    else
    {
        homepage();
    }

} catch (Exception $e){
    echo 'Erreur : '.$e->getMessage();
}



