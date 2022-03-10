<?php
    function select_all_clients_by_lastname(){
        global $db;
        $query = "SELECT * FROM clients ORDER BY lastname";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }