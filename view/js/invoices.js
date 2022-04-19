"use strict";

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
function showInvoices() {
    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const invoiceTable = document.getElementById('invoiceTable');
            let line = document.createElement('tr');
            let cell = document.createElement('td');
            const result = this.responseText;
            const invoiceData = JSON.parse(result);
            console.log(invoiceData);
            invoiceData.forEach(element => {
                cell.innerHTML = element[0];
                line.appendChild(cell);
                invoiceTable.appendChild(line);
                line = document.createElement('tr');
                cell = document.createElement('td');
            });
        }
    }
    request.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=invoicesAll');
    request.send();
}
function invoicePreview(invoiceId) {
    const items = sendRequest('invoice');
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
    for (let i = 0; i < items.length; i++) {
        const itemsSingle = items[i];
        const table = document.getElementById('invoiceTable');
        const line = document.createElement('tr');
        if (itemsSingle[0] == invoiceId) {
            document.getElementById('contractor').innerHTML = itemsSingle[6];
            for (let n = 1; n < 6; n++) {
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