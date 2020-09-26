<?php

// какаято инструкция для проверки токена!
$token = explode('Bearer ', $_SERVER['HTTP_AUTHOIZATION']);

$query = $pdo -> query("SELECT * FROM users");
$users = $query -> fetchAll(PDO::FETCH_ASSOC);

if ($users) {

    $is_token = false;

    foreach ($users as $user) {
        //если токент гуд!
        if (md5($user['password']) == $token[1]) {
            $auth_user = $user;
            $is_token = true;
        }
    }

    // если токен не валид то закрываем работу апи и ввыводим ошибку
    if (!$is_token) {
        $array = array('message' => 'You need authorization');
        header('HTTP/1.0 403 Forbidden');
        api_response($array);
    }
}