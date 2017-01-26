<?php

namespace App\Controllers;

use App\Controller;
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
        $this->view->article = Article::findOneById($_GET['id']);
        echo $this->view->render(
            __DIR__ . '/../Templates/article.php'
        );
    }

}