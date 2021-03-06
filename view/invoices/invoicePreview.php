<div class="container top-50 translate-middle position-absolute p-5" style="opacity: 1; margin: 0px auto; z-index:1002; left:40%" id="invoicePreviewContainer">
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast bg-white" id="invoicePreview" style="opacity: 1; margin: 0px auto, width: auto;">
            <div class="bg-white p-5" style="opacity: 1; margin: 0px auto; width: 200%">
                <h2 style="text-align: center">Faktura nr 2022/<span id="invoiceNumber"></span></h2>
                <h4>Klient
                    <span id="contractor" style="float: right"></span>
                </h4>
                <table class="table" id="orderInfo" style="opacity: 1; margin: 0px auto">
                    <thead>
                        <tr>
                            <td style="width: 10%">Ilość</td>
                            <td style="width: 50%">Usługa/Produkt</td>
                            <td style="width: 15%">Cena netto</td>
                            <td style="width: 10%">VAT %</td>
                            <td style="width: 15%">Cena brutto</td>
                        </tr>
                    </thead>
                    <tbody id="invoiceTable">
                    </tbody>
                </table>
                <form action="#" method="post">
                    <input type="hidden" name="modifyOrder" id="orderId">   
                    <div class="mt-2 pt-2 m-0 justify-content-end">
                        <button type="submit" class="btn btn-success btn-sm">Zatwierdź</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast" onclick="invoicePreviewClose()">Zamknij</button>
                    </div>
                </form>
            </div>
        </div>
    </div>