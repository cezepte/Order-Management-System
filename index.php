<?php
    require('model/database.php');
        if(isset($_COOKIE['login'])){
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
                $orders_by_id = $orders->select_orders_by_id();
                $orders_last_3 = $orders->select_orders_last_3();
                if(isset($_POST['insertOrder'])){
                    $service_id = $_POST['type'];
                    $comment = $_POST['comment'];
                    $clients_id = $_POST['clients_id'];
                    $price = (int)$_POST['price'];
                    $vat = (int)$_POST['vat'];
                    $status = $_POST['status'];
                    $insert_order = $orders->insert_order($service_id,$comment,$clients_id,$price,$vat,$status);
                    if($insert_order>0){
                        header('Location: index.php?orderInserted=1');
                    }
                }
                if(isset($_POST['modifyOrder'])){
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
                if(isset($_POST['deleteOrder'])){
                    $orderId = $_POST['deleteOrder'];
                    $delete_order = $orders->delete_order($orderId);
                    if($delete_order > 0){
                        header('Location: index.php?orderDeleted=1');
                    }

                }
                $all_statuses = $orders->select_all_statuses();
            include 'model/clients_db.php';
                $clients = new Clients();
                $clients_by_lastname = $clients->select_all_clients_by_lastname();
                $clients_by_id = $clients->select_all_clients_by_id();
                if(isset($_POST['insertClient'])){
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $company = $_POST['company'];
                    $tin = $_POST['tin'];
                    $tel_number = $_POST['tel_number'];
                    $email = $_POST['email'];
                    $client_insert = $clients->insert_new_client($firstName, $lastName, $company, $tin, $tel_number, $email);
                    if($client_insert>0){
                        header('Location: index.php?clientInserted=1');
                    }
                }
            include 'model/complaints_db.php';
            include 'model/company_db.php';
                $company = new Company();
                $companyData = $company->select_company_data();
                if(isset($_POST['companyName'])){
                    $companyName = $_POST['companyName'];
                    $companyTin = $_POST['companyTin'];
                    $companyStreetNumber = $_POST['companyStreetNumber'];
                    $companyPostCode = $_POST['companyPostCode'];
                    $companyCity = $_POST['companyCity'];
                    $company_data_insert = $company->update_company_data($companyName,$companyTin,$companyStreetNumber,$companyPostCode,$companyCity);
                }
            include 'model/service_db.php';
                $services = new Services();
                $all_services = $services->select_all_services();
            include 'model/invoices_db.php';
                $invoices = new Invoices();
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
                $invoices_all = $invoices->select_all_invoices();
                $invoices_items = $invoices->select_all_items();
            include 'view/panel.php';
            if(isset($_POST['log-out'])){
                unset($_COOKIE['login']);
                setcookie('login',null,-1,'/');
            }
        }else{
            include 'view/loginForm.php';
        }

?>