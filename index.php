<?php

require __DIR__ . '/autoload.php';

$parts =  explode('/', $_SERVER['REQUEST_URI']);

$controllerName = ucfirst($parts[1]) ?: 'News';
$controllerClassName = '\\App\\Controllers\\' . $controllerName;

$actionName = ucfirst($parts[2]) ?: 'All';

try  {
    $controller = new $controllerClassName;
    $controller->action($actionName);
} catch (Exception $e) {
    echo 'Возникла ошибка:' . $e->getMessage();
}
