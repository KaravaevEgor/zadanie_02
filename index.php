<?php

header("Content-Type: application/json; charset=utf-8");

header('HTTP/1.0 201 Created');

if (isset($_GET['api'])) {

    if (isset($_GET['signup'])) {

        $array = array('id' =>1);
        header('HTTP/1.0 201 Created');
        api_response($array);

    } else {

        header('HTTP/1.0 404 Not Found');
        exit;
    }


} else {

    header('HTTP/1.0 404 not found');
    exit;
}

exit;

function api_response($array) {
    //заголовок на ответ
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($array);
    exit;

}