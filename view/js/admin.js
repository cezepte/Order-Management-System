"use strict";

function loadContent() {
    const activeAction = document.querySelector('.active');
    console.log(mainText);
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const content = document.getElementById('content');
                content.innerHTML = this.responseText;
            }
        }
        xmlhttp.open('GET', 'view/' + activeAction.id + '.html');
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
window.onload = function () {
    // let n = 0;
    // document.getElementById("addPosition").onclick = invoiceNewPosition(n);

    // load sidebar
    loadSidebar();
    const navbarItems = document.querySelectorAll('.nav-link');
    for (let i = 0; i < navbarItems.length; i++) {
        navbarItems[i].addEventListener('click', (event) => {
            for (let i = 0; i < navbarItems.length; i++) {
                navbarItems[i].classList.remove('active');
            }
            event.target.classList.add('active');
            loadContent();
        })
    }

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
    showCompanyData();
}
