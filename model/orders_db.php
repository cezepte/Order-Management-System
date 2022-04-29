<?php
class Orders{
    public function select_orders_by_id_desc(){
        global $db;
        $query = "SELECT orders.id,services.name,orders.comment,CONCAT(clients.firstName,' ',clients.lastName) AS CLIENT, orders.netto_price,orders.vat,order_status.name AS status,orders.payed,orders.date_c,order_status.status_id,orders.service_id FROM orders INNER JOIN clients ON orders.clients_id = clients.client_id INNER JOIN services ON orders.service_id = services.id INNER JOIN order_status ON orders.status = order_status.status_id ORDER BY orders.id DESC";
        $statement = $db->prepare($query);
        $statement->execute();
        $results_orders_by_id_desc = $statement->fetchAll();
        $statement->closeCursor();
        return $results_orders_by_id_desc;
    }
    public function select_orders_by_id(){
        global $db;
        $query = "SELECT orders.id,services.name,orders.comment,CONCAT(clients.firstName,' ',clients.lastName) AS CLIENT, orders.netto_price,orders.vat,order_status.name AS status,orders.payed,orders.date_c,order_status.status_id,orders.service_id FROM orders INNER JOIN clients ON orders.clients_id = clients.client_id INNER JOIN services ON orders.service_id = services.id INNER JOIN order_status ON orders.status = order_status.status_id ORDER BY orders.id";
        $statement = $db->prepare($query);
        $statement->execute();
        $results_orders_by_id_desc = $statement->fetchAll();
        $statement->closeCursor();
        return $results_orders_by_id_desc;
    }
    public function select_orders_last_3(){
        global $db;
        $query = "SELECT orders.id,services.name,orders.comment,CONCAT(clients.firstName,' ',clients.lastName) AS CLIENT, orders.netto_price,orders.vat,order_status.name AS status,orders.payed,orders.date_c,order_status.status_id,orders.service_id FROM orders INNER JOIN clients ON orders.clients_id = clients.client_id INNER JOIN services ON orders.service_id = services.id INNER JOIN order_status ON orders.status = order_status.status_id ORDER BY orders.id DESC LIMIT 3";
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
    public function select_orders_finished(){
        global $db;
        $query = "SELECT * FROM orders WHERE status LIKE 'zakonczona'";
        $statement = $db->prepare($query);
        $statement->execute();
        $results_orders_finished = $statement->fetchAll();
        $statement->closeCursor();
        return $results_orders_finished;
    }
    public function insert_order($service_id,$comment,$clients_id,$price,$vat,$status){
        global $db;
        $count = 0;
        $query = "INSERT INTO orders(service_id,comment,clients_id,netto_price,vat,status) VALUES (:service_id,:comment,:clients_id,:price,:vat,:status)";
        $statement = $db->prepare($query);
        $statement->bindValue(':service_id', $service_id, PDO::PARAM_INT);
        $statement->bindValue(':comment', $comment, PDO::PARAM_STR);
        $statement->bindValue(':clients_id', $clients_id, PDO::PARAM_INT);
        $statement->bindValue(':price', $price, PDO::PARAM_INT);
        $statement->bindValue(':vat', $vat, PDO::PARAM_INT);
        $statement->bindValue(':status', $status, PDO::PARAM_INT);
        $statement->execute();
            $count = $statement->rowCount();
        $statement->closeCursor();
        return $count;
    }
    public function delete_order($orderId){
        global $db;
        $count = 0;
        $query = "DELETE FROM orders WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $orderId);
        if($statement->execute()){
            $count = $statement->rowCount();
        }
        $statement->closeCursor();
        return $count;
    }
    public function select_all_statuses(){
        global $db;
        $query = "SELECT * FROM order_status";
        $statement = $db->prepare($query);
        $statement->execute();
        $results_all_statuses = $statement->fetchAll();
        $statement->closeCursor();
        return $results_all_statuses;
    }
    public function modify_order($service_id,$comment,$netto_price,$vat,$status,$payed,$id){
        global $db;
        $query = "UPDATE orders SET service_id=:service_id,comment=:comment,netto_price=:netto_price,vat=:vat,status=:status,payed=:payed WHERE id=:id";
        $statement = $db->prepare($query);
        $statement->bindValue(':service_id', $service_id, PDO::PARAM_INT);
        $statement->bindValue(':comment', $comment, PDO::PARAM_STR);
        $statement->bindValue(':netto_price',$netto_price, PDO::PARAM_INT);
        $statement->bindValue(':vat', $vat, PDO::PARAM_INT);
        $statement->bindValue(':status', $status, PDO::PARAM_INT);
        $statement->bindValue(':payed', $payed, PDO::PARAM_INT);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
            $count = $statement->rowCount();
        $statement->closeCursor();
        return $count;
    }
}