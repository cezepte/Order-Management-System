"use strict";
function orderList() {
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            const data = this.responseText;
            const orders = JSON.parse(data);
            console.log(orders);
            const ordersPlaceholder = document.getElementById('orders');
            for (let order of orders) {
                console.log(order);
                let row = document.createElement('tr');
                let cell = document.createElement('td');
                cell.innerHTML = order[1];
                row.appendChild(cell);
                cell = document.createElement('td');
                cell.innerHTML = order[2];
                row.appendChild(cell);
                cell = document.createElement('td');
                cell.innerHTML = order[3];
                row.appendChild(cell);
                cell = document.createElement('td');
                cell.innerHTML = order[6];
                row.appendChild(cell);
                cell = document.createElement('td');
                cell.innerHTML = order[8];
                row.appendChild(cell);
                ordersPlaceholder.appendChild(row);
            }

        }
        xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=ordersByDesc');
        xmlhttp.send();
        resolve('Orders list displayed successfully!');
    });
    p.then((message) => {
        console.log(message);
    })
}
function orderPreview(orderId) {
    // const clients_table = <? php echo json_encode($clients_by_id); ?>;
    // const orders_table = <? php echo json_encode($orders_by_id); ?>;
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            const data = this.responseText;
            const orders_table = JSON.parse(data);
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
            let orderData = orders_table[orderId - 1];
            document.getElementById('orderId').value = orderData[0];
            document.getElementById('orderType').value = orderData[10];
            document.getElementById('orderComment').innerHTML = orderData[2];
            document.getElementById('orderClient').innerHTML = orderData[3];
            document.getElementById('orderPriceNetto').value = orderData[4];
            document.getElementById('orderVat').value = orderData[5];
            document.getElementById('orderStatus').value = orderData[9];
            document.getElementById('orderPayment').value = orderData[7];
            document.getElementById('orderDate').innerHTML = orderData[8];
            document.getElementById('orderHeader').innerHTML = orderId - 1;
            resolve('Order loaded successfully to the preview window!');
        }
        xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=ordersById');
        xmlhttp.send();
    });
    p.then((message) => {
        console.log(message);
    });

}
function orderPreviewClose() {
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
function orderDelete(orderId) {
    let orderData = orders_table[orderId - 1];
    document.getElementById('orderDelete').style.display = "block";
    document.getElementById('orderDeleteId').value = orderData[0];
}