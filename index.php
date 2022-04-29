<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="view/css/style_mobile.css" rel="stylesheet" media="screen and (max-width: 600px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="view/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="view/js/chartHandler.js" type="text/javascript"></script>
    <script src="view/js/invoices.js" type="text/javascript"></script>
    <script src="view/js/orders.js" type="text/javascript"></script>
    <script src="view/js/clients.js" type="text/javascript"></script>
    <script src="view/js/company.js" type="text/javascript"></script>
    <script src="view/js/admin.js" type="text/javascript" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>

<body class="bg-light">  
    <?php
    include 'view/orders/orderPreview.php';
    include 'view/orders/orderDelete.php';
    include 'view/invoices/invoicePreview.php';
    ?>
    <div class="topnav" id='topnav'>
        <a href="#" class="align-self-center mb-3 mb-md-0 me-md-auto link-dark">
            <img src="view/assets/favicon.png"  width="40" height="40" alt="" style="margin-right: 20px">
            <span class="fs-4" id="topbarCompanyName">Company name</span>
        </a>
        <button type="button" class="btn btn-success" id="sidebarToggle">
            <img src="view/assets/list.svg" alt="">
        </button>
    </div>
    <aside class="sidenav bg-white" id="sidebar"></aside>
    <div class="content d-flex alert-added-order" id="mainContainer">
        <?php 
        include 'view/home.php';
        include 'view/orders/currentOrders.php';
        include 'view/orders/addOrder.php';
        include 'view/services/addService.php';
        include 'view/clients/clients.php';
        include 'view/complaints.php';
        include 'view/orders/orderHistory.php';
        include 'view/clients/addClient.php';
        include 'view/invoices/addInvoice.php';
        include 'view/invoices/showInvoices.html';
        include 'view/company/companyData.php';
        ?>
    </div>
    <script src="view/js/chartHandler.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
