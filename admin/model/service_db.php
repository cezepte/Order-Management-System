<?php
    function select_all_services(){
        global $db;
        $query = "SELECT * FROM services";
        $statement = $db->prepare($query);
        $statement->execute();
        $results_select_all_services = $statement->fetchAll();
        return $results_select_all_services;
    }
    function insert_new_service($service_name,$service_comment,$service_vat){
        global $db;
        $count = 0;
        $query = "INSERT INTO services(name,comment,vat) VALUES (':name',':comment',':vat')";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $service_name);
        $statement->bindValue(':comment', $service_comment);
        $statement->bindValue(':vat', $service_vat);
        if($statement->execute()){
            $count = $statement->rowCount();
        }
        return $count;
    }
