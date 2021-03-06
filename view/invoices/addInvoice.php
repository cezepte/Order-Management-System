<div class="container-fluid w-100" id="addInvoice" onafterprint="invoiceTypeChange()">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="content-box m-0 border rounded bg-white shadow text-center p-5 mt-5 w-100">
                <h1>Dodaj fakturę</h1>
                <form name="newInvoice" action="#" method="post">
                    <input type="hidden" name="insertInvoice" value="1">
                    <select name="invoiceType" id="invoiceType" onchange="invoiceTypeChange()">
                        <option value="in" selected>przychodząca</option>
                        <option value="out">wychodząca</option>
                    </select>
                    <div id="invoice-in">
                        <select class="form-select form-select-lg mt-2" name="clients_id">
                            <option selected>Wybierz klienta...</option>
                            <?php
                            foreach($clients_by_lastname as $client_data){
                                echo "<option value=".$client_data['client_id'].">".$client_data['lastName']." ".$client_data['firstName']."</option>";
                            }
                            ?>
                        </select>
                        <table class="table mt-2">
                            <thead>
                                <tr>
                                    <td style="width: 10%">Ilość</td>
                                    <td style="width: 50%">Usługa/Produkt</td>
                                    <td style="width: 15%">Cena netto</td>
                                    <td style="width: 10%">VAT %</td>
                                    <td style="width: 15%">Cena brutto</td>
                                </tr>
                            </thead>
                            <tbody id="positionList">
                                <tr class="insertInvoicePosition" id="insertInvoicePosition">
                                    <td style="width: 10%">
                                        <input type="number" name="quantity[]" id="quantity" style="width: 100%">
                                    </td>
                                    <td style="width: 50%">
                                        <input type="text" name="item[]" id="item" style="width: 100%">
                                    </td>
                                    <td style="width: 15%">
                                        <input type="number" name="priceNetto[]" id="priceNetto" style="width: 100%">
                                    </td>
                                    <td style="width: 10%">
                                        <input type="number" name="vat[]" id="itemVat" style="width: 100%">
                                    </td>
                                    <td style="width: 15%">
                                        <input type="number" name="priceBrutto[]" id="priceBrutto" style="width: 100%">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a type="button" class="btn btn-success" id="addPosition">Dodaj pozycję...</a>
                    </div>
                    <div id="invoice-out" style="display:none">
                        invoice out
                    </div>
                    <button type="submit" class="btn btn-success btn-lg mt-3" style="padding-left: 25%; padding-right: 25%;">Dodaj</button>
                </form>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>