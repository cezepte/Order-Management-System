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
    console.log(invoiceId); // checking if proper invoice id is provided to the function
    let p = new Promise((resolve, reject) => {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const result = this.responseText;
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
                for (let i = 0; i < items.length; i++) {
                    const itemsSingle = items[i];
                    const table = document.getElementById('invoiceTable');
                    const line = document.createElement('tr');
                    if (itemsSingle[0] == invoiceId) {
                        document.getElementById('contractor').innerHTML = itemsSingle[6]; // display who is the invoice from
                        for (let n = 1; n < 6; n++) {
                            let cell = document.createElement('td');
                            cell.innerHTML = itemsSingle[n];
                            line.appendChild(cell);
                        }
                    }
                    table.appendChild(line);
                }
            }
        }
        xmlhttp.open('GET', 'http://localhost/iLikeMac_ajax/router.php?position=invoicesItems ');
        xmlhttp.send();
        resolve('Invoice loaded to the preview window!');
    })
    p.then((message) => {
        console.log(message);
    })
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
    // cleaning invoice table every time it loads to prevent it from displaying same data multiple times
    document.getElementById('invoiceTable').innerHTML = "";

    //promise resulting in logging successfully run code to the console with then function
    let p = new Promise((resolve, reject) => {
        // XMLHttpRequest we're looking for is table cointaining all of the invoice data such as numbers, contractors and type
        let request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // the table and all of it's rows are created and fullfilled with data requested by our XML
                const invoiceTable = document.createElement('tbody');
                invoiceTable.id = "invoiceTable";
                let line = document.createElement('tr');
                let cell = document.createElement('td');
                const result = this.responseText;
                const invoiceData = JSON.parse(result);
                // dividing data into single invoice rows
                invoiceData.forEach(element => {
                    cell.innerHTML = element[0]; // invoice id
                    line.appendChild(cell);
                    cell = document.createElement('td');
                    //the real name of invoice type displayed in each case
                    if (element[2] == "in") {
                        cell.innerHTML = "przychodząca";
                    } else {
                        cell.innerHTML = "wychodząca";
                    }
                    line.appendChild(cell);
                    cell = document.createElement('td');
                    if (element[6]) {
                        cell.innerHTML = element[6]; // contractor's company
                    } else {
                        cell.innerHTML = element[4] + element[5]; // if contractor isn't a company show his first and last name
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

function invoiceNewPosition(n) {
    n = n + 1;
    const positionList = document.getElementById('positionList');
    const form = document.createElement('form');
    const line = document.createElement('tr');
    let cell = document.createElement('td');
    form.name = "invoices_in_items_" + n;
    form.method = "post";
    const quantityNode = document.getElementById('quantity').cloneNode(true);
    quantityNode.id = "quantity-" + n;
    cell.appendChild(quantityNode);
    line.appendChild(cell);
    cell = document.createElement('td');
    const itemNode = document.getElementById('item').cloneNode(true);
    itemNode.id = "item-" + n;
    cell.appendChild(itemNode);
    line.appendChild(cell);
    cell = document.createElement('td');
    const priceNettoNode = document.getElementById('priceNetto').cloneNode(true);
    priceNettoNode.id = "priceNetto-" + n;
    cell.appendChild(priceNettoNode);
    line.appendChild(cell);
    cell = document.createElement('td');
    const vatNode = document.getElementById('itemVat').cloneNode(true);
    vatNode.id = "itemVat-" + n;
    cell.appendChild(vatNode);
    line.appendChild(cell);
    cell = document.createElement('td');
    const priceBruttoNode = document.getElementById('priceBrutto').cloneNode(true);
    priceBruttoNode.id = "priceBrutto-" + n;
    cell.appendChild(priceBruttoNode);
    line.appendChild(cell);
    positionList.appendChild(line);
    return n;
}