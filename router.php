<?php
    require('model/database.php');
        // if(isset($_COOKIE['login'])){
            // if(isset($_REQUEST['position'])){
            $position = $_REQUEST['position'];
            // }else if(isset($_POST['position'])){
            //     $position = $_POST['position'];
            // }else {
            //     $position = "";
            // }
            include 'model/finance_db.php';
            include 'model/orders_db.php';
            include 'model/clients_db.php';
            include 'model/complaints_db.php';
            include 'model/company_db.php';
            include 'model/service_db.php';
            include 'model/invoices_db.php';
            $orders = new Orders();
            $invoices = new Invoices();
            $clients = new Clients();
            $company = new Company();
            $services = new Services();
            switch($position){
                case "income":
                    $income = 0;
                    $outcome = 0;
                    $results = show_income();
                    foreach($results as $result){
                        $income = intval($result['netto_price'] * ($result['vat'] * 0.01 + 1));
                    }
                    echo $income;
                    break;
                case "ordersByDesc":
                    $orders_by_id_desc_db = $orders->select_orders_by_id_desc();
                    $orders_by_id_desc = json_encode($orders_by_id_desc_db);
                    echo $orders_by_id_desc;
                    break;
                case "ordersById":
                    $orders_by_id_db = $orders->select_orders_by_id();
                    $orders_by_id = json_encode($orders_by_id_db);
                    echo $orders_by_id;
                    break;
                case "ordersHome":
                    $orders_home_db = $orders->select_orders_home();
                    $orders_home = json_encode($orders_home_db);
                    echo $orders_home;
                    break;
                case "orderInsert":
                    if(isset($_POST['insertOrder'])){
                        $service_id = $_POST['type'];
                        $comment = $_POST['comment'];
                        $clients_id = $_POST['clients_id'];
                        $price = (int)$_POST['price'];
                        $vat = (int)$_POST['vat'];
                        $status = $_POST['status'];
                        var_dump($service_id, $comment, $clients_id, $price, $vat, $status);
                        $insert_order = $orders->insert_order($service_id,$comment,$clients_id,$price,$vat,$status);
                        if($insert_order>0){
                            echo "Order inserted succefully!";
                        }
                    }
                    break;
                case "orderSelectSingleId":
                    $id = $_REQUEST['id'];
                    $order_single_db = $orders->select_order_single_by_id($id);
                    $order_single = json_encode($order_single_db);
                    echo $order_single;
                    break;
                case "orderModify":
                    if(isset($_POST['orderModify'])){
                        $service_id = $_POST['orderType'];
                        $comment = $_POST['orderComment'];
                        $netto_price = $_POST['orderPriceNetto'];
                        $vat = $_POST['orderVat'];
                        $status = $_POST['orderStatus'];
                        $payed = $_POST['orderPayment'];
                        $id = $_POST['modifyOrder'];
                        $modify_order = $orders->modify_order($service_id,$comment,$netto_price,$vat,$status,$payed,$id);
                        if($modify_order>0){
                            header('Location: index.php?orderModified=1');
                        }
                    }
                    break;
                case "orderDelete":
                    if(isset($_POST['deleteOrder'])){
                        $orderId = $_POST['deleteOrder'];
                        $delete_order = $orders->delete_order($orderId);
                        if($delete_order > 0){
                            header('Location: index.php?orderDeleted=1');
                        }
                    }
                    break;
                case "orderStatuses":
                    $all_statuses_db = $orders->select_all_statuses();
                    $all_statuses = json_encode($all_statuses_db);
                    echo $all_statuses;
                    break;
                case "clientsByLastname":
                    $clients_by_lastname_db = $clients->select_all_clients_by_lastname();
                    $clients_by_lastname = json_encode($clients_by_lastname_db);
                    echo $clients_by_lastname;
                    break;
                case "clientsById":
                    $clients_by_id_db = $clients->select_all_clients_by_id();
                    $clients_by_id = json_encode($clients_by_id_db);
                    echo $clients_by_id;
                    break;
                case "clientsList":
                    $clients_by_id_db = $clients->select_all_clients_name_id();
                    $clients_by_id = json_encode($clients_by_id_db);
                    echo $clients_by_id;
                    break;
                case "clientsInsert":
                    var_dump($_POST);
                    if(isset($_POST['insertClient'])){
                        $firstName = $_POST['firstName'];
                        $lastName = $_POST['lastName'];
                        $company = $_POST['company'];
                        $tin = $_POST['tin'];
                        $tel_number = $_POST['tel_number'];
                        $email = $_POST['email'];
                        var_dump($firstName, $lastName, $company, $tin, $tel_number, $email);
                        $client_insert = $clients->insert_new_client($firstName, $lastName, $company, $tin, $tel_number, $email);
                        if($client_insert>0){
                            header('Location: index.php?clientInserted=1');
                        }
                    }
                    break;
                case "companyData":
                    $companyData_db = $company->select_company_data();
                    $companyData = json_encode($companyData_db);
                    echo $companyData;
                    break;
                case "companyDataUpdate":
                    if(isset($_POST['companyName'])){
                        $companyName = $_POST['companyName'];
                        $companyTin = $_POST['companyTin'];
                        $companyStreetNumber = $_POST['companyStreetNumber'];
                        $companyPostCode = $_POST['companyPostCode'];
                        $companyCity = $_POST['companyCity'];
                        $company_data_insert = $company->update_company_data($companyName,$companyTin,$companyStreetNumber,$companyPostCode,$companyCity);
                    }
                    break;
                case "servicesAll":
                    $all_services_db = $services->select_all_services();
                    $all_services = json_encode($all_services_db);
                    echo $all_services;
                    break;
                case "servicesInsert":
                    var_dump($_POST);
                    if(isset($_POST['serviceName'])){
                        $service_name = $_POST['serviceName'];
                        $service_comment = $_POST['serviceComment'];
                        $service_vat = intval($_POST['serviceVat']);
                        $insert_service = $services->insert_new_service($service_name,$service_comment,$service_vat);
                        var_dump($insert_service);
                        if($insert_service) {
                            echo 'Service inserted';
                        }
                    }
                    break;
                case "invoicesInsert":
                    if (isset($_POST['invoiceType'])){
                        $type = $_POST['invoiceType'];
                        $quantity = $_POST['quantity'];
                        $item = $_POST['item'];
                        $netto_price = $_POST['priceNetto'];
                        $vat = $_POST['vat'];
                        $brutto_price = $_POST['priceBrutto'];
                        $contractor_id = $_POST['clients_id'];
                        $invoice_insert = $invoices->insert_invoice($type,$contractor_id,$quantity,$item,$netto_price,$vat,$brutto_price);
                    }
                    break;
                case "invoicesAll":
                    $invoices_all = $invoices->select_all_invoices();
                    $invoices_output = json_encode($invoices_all);
                    echo $invoices_output;
                    break;
                case "invoicesItems":
                    $invoices_items = $invoices->select_all_items();
                    $invoices_items_table = json_encode($invoices_items);
                    echo $invoices_items_table;
                    break;
            }
            if(isset($_POST['log-out'])){
                unset($_COOKIE['login']);
                setcookie('login',null,-1,'/');
            }
        // }else{
        //     header('Location: view/loginForm.html');
        // }

?>