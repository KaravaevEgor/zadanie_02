<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, Authorization, Content-Type, X-Requested-With, Accept");
header("Access-Control-Allow-Credentials: false");

header("Content-Type: application/json; charset=utf-8");

header('HTTP/1.0 201 Created');

include_once 'settings.php';
try {
    $pdo = new PDO("mysql:host={$localhost};dbname={$database}", $username, $password);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
}

if (isset($_GET['api'])) {

    if (isset($_GET['signup'])) {

        include_once "signup.php";

    } else {
        header('HTTP/1.0 404 not found');
        exit;
    }
} else {

    header('HTTP/1.0 404 not found');
    exit;
}

function api_response($array) {
    //заголовок на ответ
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($array);
    exit;

}
