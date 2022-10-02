"use strict";

import Toast from '../js/toasts.js'
import Orders from '../js/orders.js'
import Clients from '../js/clients.js'
import Services from '../js/services.js'
import Company from '../js/company.js'

async function loadContent() {
    let p = new Promise((resolve, reject) => {
        const activeAction = document.querySelector('.active');
        console.log(activeAction);
        let fDirectory = "";
        if (activeAction.classList.contains('clients')) {
            fDirectory = "view/clients/";
        }
        else if (activeAction.classList.contains('company')) {
            fDirectory = "view/company/";
        }
        else if (activeAction.classList.contains('invoices')) {
            fDirectory = "view/invoices/";
        }
        else if (activeAction.classList.contains('orders')) {
            fDirectory = "view/orders/";
        }
        else if (activeAction.classList.contains('services')) {
            fDirectory = "view/services/";
        }
        else {
            fDirectory = "view/";
        }
        let tabToggle = activeAction.getAttribute('id');
        const file = tabToggle.replace('Toggle', '');
        console.log(file);
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = async function () {
            if (this.readyState == 4 && this.status == 200) {
                const content = document.getElementById('mainContainer');
                content.innerHTML = this.responseText;
            }
        }
        xmlhttp.open('GET', fDirectory + file + '.html');
        xmlhttp.send();
        resolve('Page loaded successfully!');
    })
    p.then((message) => {
        const company = new Company()
        company.showCompanyHomePageData()
        const activeAction = document.querySelector('.active')
        let tabToggle = activeAction.getAttribute('id')
        const file = tabToggle.replace('Toggle', '')
        setTimeout(async () => {
            const orders = new Orders()
            const services = new Services()
            const clients = new Clients()
            switch (file) {
                case 'home':
                    orders.ordersHome();
                    break;
                case 'currentOrders':
                    orders.orderList();
                    break;
                case 'addOrder':
                    document.getElementById('submitOrder').addEventListener('click', (event) => {
                        event.preventDefault();
                        orders.orderInsert();
                    })
                    orders.showServices();
                    orders.showStatuses();
                    clients.clientSelectList();
                    break;
                case 'allInvoices':
                    showInvoices()
                    break;
                case 'companyData':
                    await company.showCompanyData()
                    document.getElementById('submitCompanyInfo').addEventListener('click', (event) => {
                        event.preventDefault()
                        let companyInfoForm = document.getElementById('updateCompanyInfo')
                        company.updateCompanyInfo(companyInfoForm)
                    })
                    break;
                case 'addInvoice':
                    clients.clientSelectList();
                    // document.getElementById('addPosition').onclick = () {
                    //     invoiceNewPosition()
                    // }
                    break;
                case 'addService':
                    document.getElementById('submitService').addEventListener('click', (event) => {
                        event.preventDefault();
                        services.serviceInsert();
                    })
                    break;
                case 'addClient':
                    document.getElementById('submitClient').addEventListener('click', (event) => {
                        event.preventDefault();
                        clients.clientsInsert();
                    })
                    break;
                default:
                    break;
            }
        }, 600)
        console.log(message);
    })
}
function loadSidebar() {
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const sidebar = document.getElementById('sidebar');
                sidebar.innerHTML = this.responseText;
                loadContent(); // loading home content
                // content loading depends on which tab in sidebar is active, so those ones which can be activated have class 'activable'
                // our goal is catch which is activated by click event
                // handler for active tabs 
                const navbarItems = document.querySelectorAll('.activable');
                console.log(navbarItems);
                for (let i = 0; i < navbarItems.length; i++) {
                    navbarItems[i].addEventListener('click', (event) => {
                        for (let n = 0; n < navbarItems.length; n++) {
                            navbarItems[n].classList.remove('active');
                        }
                        event.target.classList.add('active');
                        console.log('clicked');
                        loadContent();
                    })
                }
            }
        }
        xmlhttp.open('GET', 'view/sidebar.html');
        xmlhttp.send();
        resolve('Sidebar loaded successfully!');
    })
    p.then((message) => {
        console.log(message);
    })
}

// load sidebar
loadSidebar();

window.onload = function () {
    let n = 0;
    document.getElementById("addPosition").onclick = () => {
        invoiceNewPosition(n);
        n++;
        console.log(n);
    }
    document.getElementById('sidebarToggle').onclick = function () {
        const smartphoneQuery = window.matchMedia("(max-width: 600px)");
        const tabletQuery = window.matchMedia("(max-width: 1000px)");
        const sidenav = document.getElementById('sidebar');
        const content = document.getElementById('mainContainer');
        if (smartphoneQuery.matches) {
            if (sidenav.style.display == "block") {
                sidenav.style.display = "none";
            } else {
                sidenav.style.display = "block";
            }
        } else if (tabletQuery.matches) {
            console.log('Tablet query loaded');
            if (sidenav.style.display == "block") {
                sidenav.style.display = "none";
                content.style.paddingLeft = "0";
            } else {
                sidenav.style.display = "block";
                content.style.paddingLeft = "200px";
            }
        } else {
            if (sidenav.style.display == "block") {
                sidenav.style.display = "none";
                content.style.paddingLeft = "0";
            } else {
                sidenav.style.display = "block";
                content.style.paddingLeft = "280px";
            }
        }
    };
}
