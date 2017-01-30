<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\E404Exception;
use App\Models\Article;

class News
    extends Controller
{

    public function actionAll()
    {
        $this->view->news = Article::findAll();
        echo $this->view->render(
            __DIR__ . '/../Templates/index.php'
        );
    }

    public function actionOne()
    {
        $article = Article::findOneById($_GET['id']);
        if (empty($article)) {
            throw new E404Exception();
        }
        $this->view->article = $article;
        echo $this->view->render(
            __DIR__ . '/../Templates/article.php'
        );
    }

}