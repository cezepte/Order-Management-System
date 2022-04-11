<?php
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    require ('database.php');
    global $db;
    $query = "SELECT * FROM users WHERE username = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $login);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    foreach($result as $userData){
        $userPass = $userData['password'];
    }
    var_dump($result);
    if($userPass == $pass){
        setcookie('login',$login,0,'/','localhost', false, false);
        header('Location: ../index.php');
    }else {
        header('Location: ../index.php');
    }