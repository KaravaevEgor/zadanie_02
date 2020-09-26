<?php

include_once 'settings.php';

try {
    $pdo = new PDO("mysql:host={$localhost};dbname={$database}", $username, $password);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
}

$pdo -> exec("CREATE TABLE users (
                        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Индивидуальный номер записи',
                        first_name TEXT NOT NULL,
                        surname TEXT NOT NULL,
                        phone BIGINT UNSIGNED NOT NULL,
                        password TEXT NOT NULL,
                        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$pdo -> exec("CREATE TABLE photo (
                        id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Индивидуальный номер записи',
                        name TEXT NOT NULL,
                        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");