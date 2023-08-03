<?php

class test
{
    public string $author;
    public string $creationDate;
    public string $comment;
}

$test = new test();

$test->author = 'SCO';

echo $test->author;