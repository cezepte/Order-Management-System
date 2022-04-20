"use strict";
async function sleep(time = 1) {
    const sleepMilliseconds = time * 1000

    return new Promise(resolve => {
        setTimeout(() => {
            resolve(`Slept for: ${sleepMilliseconds}ms`)
        }, sleepMilliseconds)
    })
}
function invoiceTypeChange() {
    const type = document.getElementById('invoiceType').value;
    switch (type) {
        case 'in':
            document.getElementById('invoice-out').style.display = "none";
            document.getElementById('invoice-in').style.display = "block";
            break;
        case 'out':
            document.getElementById('invoice-in').style.display = "none";
            document.getElementById('invoice-out').style.display = "block";
            break;
    }
}
async function invoicePreview(invoiceId) {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const result = this.responseXML;
            console.log(result);
            const items = JSON.parse(result);
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
            // for (let i = 0; i < items.length; i++) {
            //     const itemsSingle = items[i];
            //     const table = document.getElementById('invoiceTable');
            //     const line = document.createElement('tr');
            //     if (itemsSingle[0] == invoiceId) {
            //         document.getElementById('contractor').innerHTML = itemsSingle[6];
            //         for (let n = 1; n < 6; n++) {
            //             let cell = document.createElement('td');
            //             cell.innerHTML = itemsSingle[n];
            //             line.appendChild(cell);
            //             console.log(cell);
            //         }
            //     }
            //     console.log(itemsSingle);
            //     table.appendChild(line);
            // }
        }
    }
    xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=invoicesItems ');
    xmlhttp.send();
}
function invoicePreviewClose() {
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
async function showInvoices() {
    document.getElementById('invoiceTable').innerHTML = "";
    let p = new Promise((resolve, reject) => {
        let request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const invoiceTable = document.createElement('tbody');
                invoiceTable.id = "invoiceTable";
                let line = document.createElement('tr');
                let cell = document.createElement('td');
                const result = this.responseText;
                const invoiceData = JSON.parse(result);
                console.log(invoiceData);
                invoiceData.forEach(element => {
                    cell.innerHTML = element[0]; // invoice id
                    line.appendChild(cell);
                    cell = document.createElement('td');
                    if (element[2] == "in") {
                        cell.innerHTML = "przychodząca"; // invoice type
                    } else {
                        cell.innerHTML = "wychodząca"; // invoice type
                    }
                    line.appendChild(cell);
                    cell = document.createElement('td');
                    if (element[6]) {
                        cell.innerHTML = element[6]; // contractor's company
                    } else {
                        cell.innerHTML = element[4] + element[5]; // if contractor isn't a company show his name
                    }
                    line.appendChild(cell);
                    cell = document.createElement('td');
                    let show = document.createElement('button');
                    show.type = "submit";
                    show.innerHTML = "Pokaż";
                    show.id = element[0];
                    show.classList.add('btn', 'btn-primary', 'invoicePreview');
                    show.setAttribute('onclick', 'invoicePreview(this.id)');
                    cell.appendChild(show);
                    line.appendChild(cell);
                    cell = document.createElement('td');
                    invoiceTable.appendChild(line);
                    line = document.createElement('tr');
                });
                document.getElementById('invoicesAll').append(invoiceTable);
                // console.log(invoiceTable);
            }
        }
        request.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=invoicesAll');
        request.send();
        resolve('Invoices imported')
    })
    p.then((message) => {
        console.log(message);
    })
}