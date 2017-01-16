<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->news = \App\Models\Article::findAll();
echo $view->render(
    __DIR__ . '/App/Templates/index.php'
);