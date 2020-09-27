<?php

if (isset($_POST['phone']) && isset($_POST['password'])) {
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $token = null;

    if (is_numeric($phone)) {

        $query = $pdo -> query("SELECT * FROM users WHERE phone = '{$phone}'");
        $user = $query -> fetch(PDO::FETCH_ASSOC);

        if ($user) {

            if ($password == $user['password']) {

                $token = md5($password);

                $array = array('token' => $token);
                api_response($array);
            }

            else {
                $array = array('login' => 'Incorrect login or password');
                header('HTTP/1.0 404 Not Found');
                api_response($array);
            }
        }

        else {
            $array = array('login' => 'Incorrect login or password');
            header('HTTP/1.0 404 Not Found');
            api_response($array);
        }
    }

    else {
        $array = array('phone' => 'Incorrect phone');
        header('HTTP/1.0 404 Not Found');
        api_response($array);
    }

}

else {
    header('HTTP/1.0 404 Not Found');
    exit;
}
