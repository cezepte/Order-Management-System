<?php
    $database_config = 'model/database.php';
    if(file_exists($database_config)){
        echo 'Baza danych skonfigurowana!';
    }else{
        include 'view/installPanel.php';
    }
?>