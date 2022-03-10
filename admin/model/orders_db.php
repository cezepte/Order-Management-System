<?php
    function select_orders_by_id_desc(){
        global $db;
        $query = "SELECT * FROM orders ORDER BY id DESC";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
    function select_orders_last_3(){
        global $db;
        $query = "SELECT * FROM orders ORDER BY id DESC ";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }
    function insert_order($type,$comment,$user,$price,$vat,$status){
        global $db;
        $count = 0;
        $query = "INSERT INTO orders(type,comment,user,netto_price,vat,status) VALUES (:type,:comment,:user,:price,:vat,:status)";

        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $statement->bindValue(':comment', $comment);
        $statement->bindValue(':user', $user);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':vat', $vat);
        $statement->bindValue(':status', $status);
        if($statement_>execute()){
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }
    function delete_order($orderId){
        global $db;
        $count = 0;
        $query = "DELETE FROM orders WHERE id = ':id'";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $orderId);
        if($statement->execute()){
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count;
    }