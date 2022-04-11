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
function invoiceNewPosition() {
    let row = document.querySelector('.insertInvoicePosition');
    let nextRow = row.cloneNode(true);
    nextRow.classList.add('insertInvoicePosition');
    row.after(nextRow);
}