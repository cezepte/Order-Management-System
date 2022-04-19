<?php
    class Company{
        function select_company_data(){
            global $db;
            $query = "SELECT * FROM company";
            $statement = $db->prepare($query);
            $statement->execute();
            $companyData = $statement->fetchAll();
            return $companyData;
        }
        function update_company_data($companyName, $companyTin, $companyStreetNumber, $companyPostCode, $companyCity){
            global $db;
            $query = "UPDATE `company` SET `name`=:companyName,`tin_number`=:companyTin,`street&number`=:companyStreetNumber,`postcode`=:companyPostCode,`city`=:companyCity WHERE 1";
            $statement = $db->prepare($query);
            $statement->bindValue(":companyName", $companyName);
            $statement->bindValue(":companyTin", $companyTin);
            $statement->bindValue(":companyStreetNumber", $companyStreetNumber);
            $statement->bindValue(":companyPostCode", $companyPostCode);
            $statement->bindValue(":companyCity", $companyCity);
            $statement->execute();
            $statement->closeCursor();
        }
        function select_all_users(){
            global $db;
            $query = "SELECT * FROM users";
            $statement = $db->prepare($query);
            $statement->execute();
            $users = $statement->fetchAll();
            return $users;
        }
        function insert_new_user($username, $password, $firstName, $lastName, $role){
            global $db;
            $query = "INSERT INTO users(username,password,firstName,lastName,role) VALUES(:username,:password,:firstName,:lastName,:role)";
            $statement = $db->prepare($query);
            $statement->bindValue(":username", $username);
            $statement->bindValue(":password", $password); 
            $statement->bindValue(":firstName", $firstName); 
            $statement->bindValue(":lastName", $lastName); 
            $statement->bindValue(":role", $role); 
            $statement->execute();
            $statement->closeCursor();
        }
    }
?>