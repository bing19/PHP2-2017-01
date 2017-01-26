<?php

require __DIR__ . '/autoload.php';

function checkPassword($password): bool
{
    $errors = new \App\MultiException();

    if (empty($password)) {
        $errors->add(new Exception('Пустой пароль'));
        throw $errors;
    }
    if (strlen($password) < 6) {
        $errors->add(new Exception('Слишком короткий пароль'));
    }
    if (!preg_match('~\d~', $password)) {
        $errors->add(new Exception('Нет цифры'));
    }

    if (!$errors->isEmpty()) {
        throw $errors;
    }

    return true;
}

try {
    checkPassword('');
} catch (\App\MultiException $errors) {
    foreach ($errors as $error) {
        echo $error->getMessage();
    }
}