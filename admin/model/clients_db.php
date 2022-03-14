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
        $query = "INSERT INTO clients(firstName,lastName,company,tel_number,email) VALUES (':firstName', ':lastName',':company',':tel_number','email')";
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':company', $company);
        $statement->bindValue(':tel_number', $tel_number);
        $statement->bindValue(':email', $email);
        if($statement->execute()){
            $count = 1;
        }
        $statement->closeCursor();
        return $count;
    }
}  