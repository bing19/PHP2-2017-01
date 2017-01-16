<?php

require __DIR__ . '/autoload.php';

$article = new \App\Models\Article();
$article->title = 'Тестовый заголовок';
$article->insert();

var_dump($article);