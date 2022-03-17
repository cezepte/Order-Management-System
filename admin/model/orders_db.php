<?php
class Orders{
    public function select_orders_by_id_desc(){
        global $db;
        $query = "SELECT * FROM orders INNER JOIN clients ON orders.clients_id = clients.client_id ORDER BY orders.id DESC";
        $statement = $db->prepare($query);
        $statement->execute();
        $results_orders_by_id_desc = $statement->fetchAll();
        $statement->closeCursor();
        return $results_orders_by_id_desc;
    }
    public function select_orders_last_3(){
        global $db;
        $query = "SELECT * FROM orders INNER JOIN clients ON orders.clients_id = clients.client_id ORDER BY id DESC LIMIT 3";
        $statement = $db->prepare($query);
        $statement->execute();
        $results_orders_last_3 = $statement->fetchAll();
        $statement->closeCursor();
        return $results_orders_last_3;
    }
    public function select_orders_of_single_client($clients_id){
        global $db;
        $query = "SELECT * FROM orders INNER JOIN clients ON orders.clients_id = clients.client_id  WHERE clients.client_id = :clients_id ORDER BY orders.id";
        $statement = $db->prepare($query);
        $statement->bindValue(':clients_id', $clients_id, PDO::PARAM_INT);
        $statement->execute();
        $results_orders_of_single_client = $statement->fetchAll();
        $statement->closeCursor();
        return $results_orders_of_single_client;
    }
    public function insert_order($type,$comment,$user,$price,$vat,$status){
        global $db;
        $count = 0;
        $query = "INSERT INTO orders(type,comment,clients_id,netto_price,vat,status) VALUES (:type,:comment,:clients_id,:price,:vat,:status)";
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type, PDO::PARAM_STR);
        $statement->bindValue(':comment', $comment, PDO::PARAM_STR);
        $statement->bindValue(':clients_id', $clients_id, PDO::PARAM_STR);
        $statement->bindValue(':price', $price, PDO::PARAM_INT);
        $statement->bindValue(':vat', $vat, PDO::PARAM_INT);
        $statement->bindValue(':status', $status, PDO::PARAM_STR);
        $statement->execute();
            $count = $statement->rowCount();
        $statement->closeCursor();
        return $count;
    }
    public function delete_order($orderId){
        global $db;
        $count = 0;
        $query = "DELETE FROM orders WHERE id = ':id'";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $orderId);
        if($statement->execute()){
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count_delete_order;
    }
    public function show_order_details($orderId){
        global $db;
        $query = "SELECT * FROM orders WHERE id = $orderId";
        $statement = $db->prepare($query);
        $statement->execute();
        $results_orders_by_id_desc = $statement->fetchAll();
        $statement->closeCursor();
        return $results_order_details;
    }
}