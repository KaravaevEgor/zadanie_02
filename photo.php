<?php

if (isset($_GET['photo'])) {

    if (isset($_FILES['photo'])) {
        $name = $_FILES["photo"]["name"];

        $prepare = $pdo->prepare("INSERT INTO 
                    photo (name) 
                    values (:name);");

        $prepare->bindValue(":name", $name);

        $execute = $prepare->execute();

        if ($execute) {

            $photo_id = $pdo->lastInsertId();


            header('HTTP/1.0 422 Unprocessable entity');

            $array = array('id' => $photo_id,
                'name' => $name,
                'url' => "http://localhost/images/" .  $name);
            api_response($array);
        }

        else {
            $array = array('photo' => 'Incorrect photo');
            header('HTTP/1.0 422 Unprocessable entity');
            api_response($array);
        }
    }

    else {
        $array = array('photo' => 'Incorrect photo');
        header('HTTP/1.0 422 Unprocessable entity');
        api_response($array);
    }
}
