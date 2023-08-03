<?php
require_once 'src/model/comment.php';


class test
{
    public string $author;
    public string $creationDate;
    public string $comment;
}

$test = new test();

$test->author = 'SCO';

echo $test->author;

$comments = getComments("1");

echo '<pre>';
print_r($comments);
