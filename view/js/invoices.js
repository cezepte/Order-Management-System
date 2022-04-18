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
};