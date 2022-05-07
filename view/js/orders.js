"use strict";
function showServices() {
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const data = this.responseText;
                const services = JSON.parse(data);
                const optionList = document.getElementById('orderType');
                for (let service of services) {
                    const option = document.createElement('option');
                    option.value = service[0];
                    option.innerHTML = service[1];
                    optionList.appendChild(option);
                }
            }
        }
        xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=servicesAll');
        xmlhttp.send();
        resolve('Services loaded successfully!');
    })
    p.then((message) => {
        console.log(message);
    })
}
function showStatuses() {
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const data = this.responseText;
                const statuses = JSON.parse(data);
                const optionList = document.getElementById('orderStatus');
                for (let status of statuses) {
                    const option = document.createElement('option');
                    option.value = status[0];
                    option.innerHTML = status[1];
                    optionList.appendChild(option);
                }
            }
        }
        xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=orderStatuses');
        xmlhttp.send();
        resolve('Services loaded successfully!');
    })
    p.then((message) => {
        console.log(message);
    })
}
function orderList() {
    da
}
function orderPreview(orderId) {
    showServices();
    showStatuses();
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const data = this.responseText;
                const orders_table = JSON.parse(data);
                console.log(orders_table);
                // getting elements to blend them into background for better visibility
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
            }
        }
        xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=ordersById');
        xmlhttp.send();
        resolve('Order loaded successfully to the preview window!');
    })
    p.then((message) => {
        console.log(message);
    })
}
function ordersDescList() {
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const data = this.responseText;
                const orders = JSON.parse(data);
                const ordersPlaceholder = document.getElementById('lastOrdersTable');
                ordersPlaceholder.innerHTML = "";
                // making single order rows
                for (let order of orders) {
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
                    cell = document.createElement('td');
                    let show = document.createElement('button');
                    show.type = "submit";
                    show.innerHTML = "Pokaż";
                    show.id = order[0];
                    show.classList.add('btn', 'btn-success', 'orderPreview');
                    show.setAttribute('onclick', 'orderPreview(this.id)');
                    let deleteButton = document.createElement('button');
                    deleteButton.type = "submit";
                    deleteButton.innerHTML = "Usuń";
                    deleteButton.id = order[0];
                    deleteButton.classList.add('btn', 'btn-danger', 'orderDelete');
                    deleteButton.setAttribute('onclick', 'orderDelete(this.id)');
                    cell.appendChild(show);
                    cell.appendChild(deleteButton);
                    row.appendChild(cell);
                    ordersPlaceholder.appendChild(row);
                }
            }
        }
        xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=ordersByDesc');
        xmlhttp.send();
        resolve('Orders list displayed successfully!');
    })
    p.then((message) => {
        console.log(message);
    })
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
    alert(`Delete order ${orderId}?`);
}
function orderInsert() {
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = () => {
            if (this.readyState == 4 && this.status == 200) {
                console.log('success');
            }
        }
        xmlhttp.open("POST", "http://localhost/iLikeMac_ajax/router.php?position=ordersInsert");
        xmlhttp.send();
    })
}