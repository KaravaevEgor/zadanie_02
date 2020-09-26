<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Authorization, Content-Type, X-Requested-With, Accept");

include_once 'settings.php';

$auth_user = null;

try {
    $pdo = new PDO("mysql:host={$localhost};dbname={$database}", $username, $password);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
}


if (isset($_GET['api'])) {

    if (isset($_GET['signup'])) {

        include_once "signup.php";
    }

    else if (isset($_GET['login'])) {

        include_once "login.php";
    }

    else {

        include_once "auth_protect.php";

        if (isset($_GET['photo'])) {

            include_once "photo.php";
        }

        else {

            header('HTTP/1.0 404 Not Found');
            exit;
        }
    }
}

else {

    header('HTTP/1.0 404 Not Found');
    exit;
}

function api_response($array) {

    // Заголовки на ответ.
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($array);
    exit;
}
