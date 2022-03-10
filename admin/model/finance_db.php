<?php
    function show_income(){
        global $db;
        $query = "SELECT netto_price, vat FROM orders";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
    