<?php

require __DIR__ . '/autoload.php';

try {
    $article = new \App\Models\Article();
    $article->fill($_POST);
    $article->save();
} catch (\App\MultiException $errors) {
    foreach ($errors as $error) {
        echo $error->getMessage();
    }
}