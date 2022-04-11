<?php
class Services{
    public function select_all_services(){
        global $db;
        $query = "SELECT * FROM services";
        $statement = $db->prepare($query);
        $statement->execute();
        $results_select_all_services = $statement->fetchAll();
        return $results_select_all_services;
    }
    public function insert_new_service($service_name,$service_comment,$service_vat){
        global $db;
        $count = 0;
        $query = "INSERT INTO services(name,comment,vat) VALUES (':name',':comment',':vat')";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $service_name, PDO::PARAM_STR);
        $statement->bindValue(':comment', $service_comment, PDO::PARAM_STR);
        $statement->bindValue(':vat', $service_vat,PDO::PARAM_INT);
        if($statement->execute()){
            $count = $statement->rowCount();
        }
        return $count;
    }
}