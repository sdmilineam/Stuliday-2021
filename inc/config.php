<?php


try {
    $connect = new PDO("mysql:host=localhost;dbname=stuliday_2021", 'root', '');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    session_start();
} catch (PDOException $error) {

    echo 'Erreur: ' . $error->getMessage();


}

?>