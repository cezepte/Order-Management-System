"use strict";
function loadContent() {
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
        xmlhttp.onreadystatechange = function () {
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
                loadContent();
                //handler for active tab
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
    // let n = 0;
    // document.getElementById("addPosition").onclick = invoiceNewPosition(n);

    document.getElementById('sidebarToggle').onclick = function () {
        const smartphoneQuery = window.matchMedia("(max-width: 600px)");
        const sidenav = document.getElementById('sidebar');
        const content = document.getElementById('mainContainer');
        if (smartphoneQuery.matches) {
            if (sidenav.style.display == "block") {
                sidenav.style.display = "none";
            } else {
                sidenav.style.display = "block";
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
