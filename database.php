<?php
    $db_user = 'localhost';
    $db_name = "bureau-etude";
    $dsn = "mysql:host=$db_user;dbname=$db_name";
    $db_username = "root";
    $db_password = "";

    try {
        $pdo = new PDO($dsn, $db_username, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "hello motherfucker";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>