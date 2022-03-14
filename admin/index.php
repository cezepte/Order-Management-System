<?php
    require('model/database.php');
    include 'model/finance_db.php';
    $income = 0;
    $outcome = 0;
    $results = show_income();
    foreach($results as $result){
        $income = intval($result['netto_price'] * ($result['vat'] * 0.01 + 1));
    }
    include 'model/orders_db.php';
    $orders = new Orders();
    $orders_by_id_desc = $orders->select_orders_by_id_desc();
    include 'model/clients_db.php';
    $clients = new Clients();
    $clients_by_lastname = $clients->select_all_clients_by_lastname();
    // $clients_insert_new = $clients->insert_new_client();
    include 'view/panel.php';
?>