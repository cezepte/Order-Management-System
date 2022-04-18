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
    <script src="view/js/admin.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        function clientDetails(clientId){
            const clients_table = <?php echo json_encode($clients_by_id); ?>;
            let userData = clients_table[clientId-1];
            document.getElementById('firstName').innerHTML = userData[1];
            document.getElementById('lastName').innerHTML = userData[2];
            document.getElementById('company').innerHTML = userData[3];
            document.getElementById('tin').innerHTML = userData[4];
            document.getElementById('telNumber').innerHTML = userData[5];
            document.getElementById('email').innerHTML = userData[6];
        }
        function orderPreview(orderId) {
            const clients_table = <?php echo json_encode($clients_by_id); ?>;
            const orders_table = <?php echo json_encode($orders_by_id); ?>;
            const topnav = document.getElementById('topnav');
            const orderPreviewBlock = document.getElementById('orderPreview');
            const sidebar = document.getElementById('sidebar');
            const mainContainer = document.getElementById('mainContainer');
            const orderPreviewContainer = document.getElementById('orderPreviewContainer');
            orderPreviewBlock.style.display = "block";
            orderPreviewContainer.style.display = 'block';
            topnav.style.opacity = "0.50";
            sidebar.style.opacity = "0.50";
            mainContainer.style.opacity = "0.50";
            let orderData = orders_table[orderId-1];
            document.getElementById('orderId').value = orderData[0];
            document.getElementById('orderType').value = orderData[10];
            document.getElementById('orderComment').innerHTML = orderData[2];
            document.getElementById('orderClient').innerHTML = orderData[3];
            document.getElementById('orderPriceNetto').value = orderData[4];
            document.getElementById('orderVat').value = orderData[5];
            document.getElementById('orderStatus').value = orderData[9];
            document.getElementById('orderPayment').value = orderData[7];
            document.getElementById('orderDate').innerHTML = orderData[8];
            document.getElementById('orderHeader').innerHTML = orderId-1;
        }
        function orderPreviewClose(){
            const topnav = document.getElementById('topnav');
            const orderPreviewBlock = document.getElementById('orderPreview');
            const sidebar = document.getElementById('sidebar');
            const mainContainer = document.getElementById('mainContainer');
            const orderPreviewContainer = document.getElementById('orderPreviewContainer');
            orderPreviewContainer.style.display = 'none';
            topnav.style.opacity = "1";
            orderPreviewBlock.style.display = "none";
            sidebar.style.opacity = "1";
            mainContainer.style.opacity = "1"; 
        }
        function orderDelete(orderId){
            let orderData = orders_table[orderId-1];
            document.getElementById('orderDelete').style.display = "block";
            document.getElementById('orderDeleteId').value = orderData[0];
        }
        function invoicePreview(invoiceId){
            const items = <?php echo json_encode($invoices_items); ?>;
            const topnav = document.getElementById('topnav');
            const invoicePreviewBlock = document.getElementById('invoicePreview');
            const sidebar = document.getElementById('sidebar');
            const mainContainer = document.getElementById('mainContainer');
            const invoicePreviewContainer = document.getElementById('invoicePreviewContainer');
            invoicePreviewBlock.style.display = "block";
            invoicePreviewContainer.style.display = 'block';
            topnav.style.opacity = "0.50";
            sidebar.style.opacity = "0.50";
            mainContainer.style.opacity = "0.50";
            document.getElementById('invoiceNumber').innerHTML = invoiceId;
            for (let i = 0; i <items.length; i++){
                const itemsSingle = items[i];
                const table = document.getElementById('invoiceTable');
                const line = document.createElement('tr');
                if(itemsSingle[0] == invoiceId){
                    document.getElementById('contractor').innerHTML = itemsSingle[6];
                    for(let n = 1; n<6; n++){
                        let cell = document.createElement('td');
                        cell.innerHTML = itemsSingle[n];
                        line.appendChild(cell);
                        console.log(cell);
                    }
                }
                console.log(itemsSingle);
                table.appendChild(line);
            }
        }
        function invoicePreviewClose(){
            const topnav = document.getElementById('topnav');
            const invoicePreviewBlock = document.getElementById('invoicePreview');
            const sidebar = document.getElementById('sidebar');
            const mainContainer = document.getElementById('mainContainer');
            const invoicePreviewContainer = document.getElementById('invoicePreviewContainer');
            invoicePreviewBlock.style.display = "none";
            invoicePreviewContainer.style.display = 'none';
            topnav.style.opacity = "1";
            sidebar.style.opacity = "1";
            mainContainer.style.opacity = "1";
            document.getElementById('invoiceTable').innerHTML = "";   
        }
        function showCompanyData(){
            const data = <?php echo json_encode($companyData); ?>;
            const dataTable = data[1];
            console.log(dataTable[0]);
            document.getElementById('companyName').value = dataTable[0];
            document.getElementById('companyTin').value = dataTable[1];
            document.getElementById('companyStreetNumber').value = dataTable[2];
            document.getElementById('companyPostCode').value = dataTable[3];
            document.getElementById('companyCity').value = dataTable[4];
            document.getElementById('topBarCompanyName').innerHTML = dataTable[0];
        }
    </script>
</head>

<body class="bg-light">  
    <?php
    include 'view/orders/orderPreview.php';
    include 'view/orders/orderDelete.php';
    include 'view/invoices/invoicePreview.php';
    ?>
    <div class="topnav w-100 bg-white p-3 border-bottom" style="z-index: 303" id='topnav'>
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none" style="float:left; width: 280px; z-index: 302">
            <img src="view/assets/favicon.png"  width="40" height="40" alt="" style="margin-right: 20px">
            <span class="fs-4" id="topBarCompanyName">Company name</span>
        </a>
        <form class="d-flex w-25" id="searchBar" style="float: right; margin-left: 50px">
            <input class="form-control me-2" type="search" placeholder="Szukaj" aria-label="Szukaj">
            <button class="btn btn-outline-success" type="submit">Szukaj</button>
        </form>
        <div class="form-check form-switch m-2" style="float: right; display: inline-block" id="darkModeSwitch">
            <label for="darkMode">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                    <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
                </svg>
            </label>
            <input class="form-check-input" type="checkbox" role="switch" name="darkMode" id="dark-mode">
        </div>
    </div>
    <?php
        include 'view/sidebar.php';
    ?>
    <div class="content alert-added-order" id="mainContainer">
        <?php 
        include 'view/home.php';
        include 'view/orders/currentOrders.php';
        include 'view/orders/addOrder.php';
        include 'view/services/addService.php';
        include 'view/clients/clients.php';
        include 'view/complaints.php';
        include 'view/orders/orderHistory.php';
        include 'view/parcels.php';
        include 'view/clients/addClient.php';
        include 'view/invoices/addInvoice.php';
        include 'view/invoices/showInvoices.php';
        include 'view/company/companyData.php';
        ?>
    </div>
    <div class="toggle">
        <button type="button" class="btn btn-success mt-5" id="hide-sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
    </div>
    <script src="view/js/chartHandler.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
