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
        }
    }
?>