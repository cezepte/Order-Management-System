"use strict";
$(document).ready(function () {
    $('.activable').click(function () {
        $('a.activable').removeClass('active');
        $(this).addClass('active');
    });

    $('#currentOrders, #addOrder, #addService, #clients, #complaints, #parcels, #allServices, #users, #settings, #companyData, #orderHistory, #addInvoice, #costInvoices, #allInvoices, #addClient, #addContractor, #contractors, #previewOrder').hide();
    $('#currentOrdersToggle, #addOrderToggle, #addServiceToggle, #homeToggle, #complaintsToggle, #parcelsToggle, #clientsToggle, #allServicesToggle, #usersToggle, #settingsToggle, #companyDataToggle, #orderHistoryToggle, #addInvoiceToggle, #costInvoicesToggle, #allInvoicesToggle, #addClientToggle, #addContractorToggle, #contractorsToggle').click(function () {
        $("#home, #currentOrders, #addOrder, #addClient, #addService, #clients, #complaints, #parcels, #allServices, #users, #settings, #companyData, #orderHistory, #addInvoice, #allInvoices").hide();
        let elementId = $(this).attr('id').replace("Toggle", "");
        $('#' + elementId).show();
    });
});

window.onload = function () {
    let n = 0;
    document.getElementById("addPosition").onclick = function invoiceNewPosition() {
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
    };
    document.getElementById('hide-sidebar').onclick = function () {
        const sidenav = document.getElementById('sidebar');
        const content = document.getElementById('mainContainer');
        if (sidenav.style.display == "block") {
            sidenav.style.display = "none";
            content.style.paddingLeft = "0";
        } else {
            sidenav.style.display = "block";
            content.style.paddingLeft = "280px";
        }
    };
    document.getElementById('log-out-toggle').onclick = function () {
        document.getElementById('log-out').submit();
    }
}