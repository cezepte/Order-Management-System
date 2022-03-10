<?php
function authentication($login,$pass){
    global $db;
    $logged = 0;
    $query = "SELECT username,password FROM users WHERE username=':username' && role='admin'";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $login);
    $statement->execute();
    $result = $statement->fetchAll();
    if($result['username']==$login && $result['password']==$pass){
        $logged = 1;
        return $logged;
    }else {
        return $logged;
    }
}