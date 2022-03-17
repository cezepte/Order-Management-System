<?php
    require('model/database.php');
    $userName = $_COOKIE['login'];

    include 'model/finance_db.php';
    $income = 0;
    $outcome = 0;
    $results = show_income();
    foreach($results as $result){
        $income = intval($result['netto_price'] * ($result['vat'] * 0.01 + 1));
    }
    // piechot was here
    include 'model/orders_db.php';
    $orders = new Orders();
    $orders_by_id_desc = $orders->select_orders_by_id_desc();
    $orders_last_3 = $orders->select_orders_last_3();
    if(isset($_POST['insertOrder'])){
        $type = $_POST['type'];
        $comment = $_POST['comment'];
        $clients_id = $_POST['clients_id'];
        $price = (int)$_POST['price'];
        $vat = (int)$_POST['vat'];
        $status = $_POST['status'];
        $insert_order = $orders->insert_order($type,$comment,$user,$price,$vat,$status);
        if($insert_order>0){
            header('Location: index.php?orderInserted=1');
        }
    }
    include 'model/clients_db.php';
    $clients = new Clients();
    $clients_by_lastname = $clients->select_all_clients_by_lastname();
    if(isset($_POST['insertClient'])){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $company = $_POST['company'];
        $tel_number = $_POST['tel_number'];
        $email = $_POST['email'];
        $client_insert = $clients->insert_new_client($firstName, $lastName, $company, $tel_number, $email);
        if($client_insert>0){
            header('Location: index.php?clientInserted=1');
        }
    }
    include 'model/complaints_db.php';
    include 'view/panel.php';
?>