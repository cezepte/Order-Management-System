<?php
class Clients{
    public function select_all_clients_by_lastname(){
        global $db;
        $query = "SELECT * FROM clients ORDER BY lastname";
        $statement = $db->prepare($query);
        $statement->execute();
        $results_select_all_clients_by_lastname = $statement->fetchAll();
        $statement->closeCursor();
        return $results_select_all_clients_by_lastname;
    }
    public function select_all_clients_by_id(){
        global $db;
        $query = "SELECT * FROM clients ORDER BY id";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
    public function insert_new_client($firstName, $lastName, $company, $tel_number, $email){
        global $db;
        $count = 0;
        $query = "INSERT INTO clients(firstName,lastName,company,tel_number,email) VALUES (:firstName, :lastName, :company, :tel_number, :email)";
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $statement->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $statement->bindValue(':company', $company, PDO::PARAM_STR);
        $statement->bindValue(':tel_number', $tel_number, PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        if($statement->execute()){
            $count = 1;
        }
        $statement->closeCursor();
        return $count;
    }
    public function select_client_by_id($userId){
        global $db;
        $query = "SELECT * FROM clients WHERE id = $userId";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}  