"use strict";

import Toast from './toasts.js'

export default class Orders {

    constructor() { }

    async showServices() {
        let p = new Promise((resolve, reject) => {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const data = this.responseText;
                    const services = JSON.parse(data);
                    const optionList = document.querySelector('#orderType')
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
    async showStatuses() {
        let p = new Promise((resolve, reject) => {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const data = this.responseText;
                    const statuses = JSON.parse(data);
                    const optionList = document.querySelector('#orderStatus');
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
            resolve('Statuses loaded successfully!');
        })
        p.then((message) => {
            console.log(message);
        })
    }
    async orderList() {
        let p = new Promise((resolve, reject) => {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const data = this.responseText;
                    const orders = JSON.parse(data);
                    const ordersPlaceholder = document.getElementById('ordersTable');
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

    async ordersHome() {
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
                        let show = document.createElement('button');
                        show.type = "submit";
                        show.innerHTML = "Pokaż";
                        show.id = order[0];
                        show.classList.add('btn', 'btn-success', 'orderPreview');
                        show.setAttribute('onclick', 'orderPreview(this.id)');
                        cell.appendChild(show);
                        row.appendChild(cell);
                        ordersPlaceholder.appendChild(row);
                    }
                }
            }
            xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=ordersHome');
            xmlhttp.send();
            resolve('Orders list displayed successfully!');
        })
        p.then((message) => {
            console.log(message);
        })
    }
    orderPreviewClose() {
        const popup = document.querySelector('.popup-window');
        popup.innerHTML = "";
        const topnav = document.getElementById('topnav');
        const sidebar = document.getElementById('sidebar');
        const mainContainer = document.getElementById('mainContainer');
        topnav.style.opacity = "1";
        sidebar.style.opacity = "1";
        mainContainer.style.opacity = "1";

    }
    orderDelete(orderId) {
        alert(`Delete order ${orderId}?`);
    }
    async orderInsert() {
        new Toast({ text: "Przesyłanie..." });
        let p = new Promise((resolve, reject) => {
            const newOrder = document.getElementById('addOrderForm');
            var formData = new FormData(newOrder);
            formData.append('insertOrder', true);
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    resolve('Order sent successfully to the preview window!');
                }
            }
            xmlhttp.open('POST', 'router.php?position=orderInsert');
            xmlhttp.setRequestHeader('Accept', '*/*');
            xmlhttp.send(formData);
        })
        p.then((message) => {
            console.log(message);
        });
        new Toast({ text: "Przesłano!" });

    }
    async orderModify() {
        let p = new Promise((resolve, reject) => {
            const modifiedOrder = document.getElementById('modifyOrderForm');
            var formData = new FormData(modifiedOrder);
            formData.append('orderModify', true);
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    resolve('Order has been updated successfully!');
                }
            }
            xmlhttp.open('POST', 'router.php?position=orderModify');
            xmlhttp.setRequestHeader('Accept', '*/*');
            xmlhttp.send(formData);
        })
        p.then((message) => {
            console.log(message);
        });
    }
}

function orderPreviewWindow() {
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const popup = document.querySelector('.popup-window');
                popup.innerHTML = this.responseText;
                document.getElementById('modifyOrder').addEventListener('click', (event) => {
                    event.preventDefault();
                    orderModify();
                })
            } else {
                reject('Connection error');
            }
        }
        xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/view/orders/orderPreview.html');
        xmlhttp.send();
        resolve('Order window loaded successfully!');
    })
    p.then((message) => {
        console.log(message)
    })
}

async function orderPreview(orderId) {
    orderPreviewWindow();
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
                orderPreviewBlock.style.position = "fixed";
                orderPreviewContainer.style.display = 'block';
                topnav.style.opacity = "0.50";
                sidebar.style.opacity = "0.50";
                mainContainer.style.opacity = "0.50";
                let orderData = orders_table[0];
                console.log(orderData);
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
                showServices();
                showStatuses();
            }
        }
        xmlhttp.open('GET', 'router.php?position=orderSelectSingleId&id=' + orderId);
        xmlhttp.send();
        resolve('Order loaded successfully to the preview window!');
    })
    p.then((message) => {
        console.log(message);
    })
}