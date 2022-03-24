<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="view/css/style.css">
    <link href="view/css/style_mobile.css" rel="stylesheet" media="screen and (max-width: 600px)">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="view/js/chartHandler.js"></script>
    <script src="view/js/admin.js"></script>
    <script type="module" src="view/js/js.cookie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script>
        const clients_table = <?php echo json_encode($clients_by_id); ?>;
        const orders_table = <?php echo json_encode($orders_by_id); ?>;
        $(document).ready( function(){
            $('.client').click(function () {
                let userId = $(this).attr('id').replace('client_', '');
                let userData = clients_table[userId-1];
                $('.client-info-table').html("<tr><td>Imię:</td><td><strong> "+userData[1]+"</strong></td></tr><tr><td>Nazwisko:</td> <td><strong>"+userData[2]+"</strong></td></tr><tr><td>Firma: </td><td><strong>"+userData[3]+"</strong></td></tr><tr><td>NIP: </td><td><strong>"+userData[4]+"</strong></strong></td></tr><tr><td>Telefon: </td><td><strong>"+userData[5]+"</strong></td></tr><tr><td>E-mail: </td><td><strong>"+userData[6]+"</strong></td></tr>");
            });
        });
        function clientDetails(clientId){
            let clientData = clients_table[clientId-1];

        }
        const content = document.getElementById('orderPreview');
        function orderPreview(orderId) {
            let orderData = orders_table[orderId-1];
            const table = document.getElementById('orderInfo');
            const content = document.getElementById('orderPreview');
            content.style.display = "block";
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
        function orderDelete(orderId){
            let orderData = orders_table[orderId-1];
            document.getElementById('orderDelete').style.display = "block";
            document.getElementById('orderDeleteId').value = orderData[0];
        }
    </script>
</head>

<body class="bg-light">  
    <?php
        include 'view/orders/orderPreview.php';
        include 'view/orders/orderDelete.php';
    ?>
    <div class="topnav w-100 bg-white p-3 border-bottom" style="z-index: 303">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none" style="float:left; width: 280px; z-index: 302">
            <img src="view/assets/favicon.png"  width="40" height="40" alt="" style="margin-right: 20px">
            <span class="fs-4">iLikeMac</span>
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
        include 'view/addService.php';
        include 'view/clients.php';
        include 'view/complaints.php';
        include 'view/orders/orderHistory.php';
        include 'view/parcels.php';
        include 'view/addClient.php';
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
