<?php
    $dsn = 'mysql:host=localhost;dbname=serwis_test';
    $username = 'root';
    $password = 'root';

    try{
        $db = new PDO($dsn,$username,$password);

    }catch(PDOExceprion $e){
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        include('view/error.php');

        exit();
    }