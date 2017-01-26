<?php

namespace App;

abstract class Controller
{

    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function beforeAction()
    {}

    protected function access(): bool
    {
        return true;
    }

    public function action(string $name)
    {
        $this->beforeAction();
        $actionName = 'action' . $name;
        if ($this->access()) {
            $this->$actionName();
        } else {
            die('Нет доступа');
        }
    }

}