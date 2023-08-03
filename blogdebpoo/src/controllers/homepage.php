<?php

use App\Model\Post\PostRepository;
use App\lib\db\DbConnection;


require_once 'src/model/post.php';
require_once 'src/lib/db.php';

function homepage(){
    $postRepo = new PostRepository();
    $postRepo->connection = new DbConnection();
    $posts = $postRepo->getPosts();

    require 'templates/homepage.php';
}
