<?php

if (isset($_POST['first_name']) &&
    isset($_POST['surname']) &&
    isset($_POST['phone']) &&
    isset($_POST['password'])) {

    $first_name = $_POST['first_name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = $pdo -> query("SELECT * FROM users WHERE phone = '{$phone}'");
    $user = $query -> fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $array = array('error' => 'Пользователь с таким телефоном уже зарегистрирован.');
        header('HTTP/1.0 422 Unprocessable entity');
        api_response($array);
    }

    else {

        $prepare = $pdo->prepare("INSERT INTO 
                    users (first_name, surname, phone, password) 
                    values (:first_name, :surname, :phone, :password)");

        $prepare->bindValue(":first_name", $first_name);
        $prepare->bindValue(":surname", $surname);
        $prepare->bindValue(":phone", $phone);
        $prepare->bindValue(":password", $password);

        $execute = $prepare->execute();

        if ($execute) {

            $user_id = $pdo->lastInsertId();

            $array = array('id' => $user_id);
            header('HTTP/1.0 201 Created');
            api_response($array);
        } else {
            $array = array('error' => 'Добавить пользователя не удалось.');
            header('HTTP/1.0 422 Unprocessable entity');
            api_response($array);
        }
    }
}

else {

    $array = array('error' => 'Нет всех обязательных данных.');

    header('HTTP/1.0 422 Unprocessable entity');
    api_response($array);
}