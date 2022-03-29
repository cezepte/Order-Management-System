    <div class="container start-50 top-50 translate-middle position-absolute p-5" style="opacity: 1; margin: 0px auto; z-index:1002" id="orderPreviewContainer">
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast bg-white" id="orderPreview" style="opacity: 1; margin: 0px auto">
            <div class="toast-body bg-white" style="opacity: 1; margin: 0px auto">
                <table class="table" id="orderInfo" style="opacity: 1; margin: 0px auto">
                    <form action="#" method="post">
                        <input type="hidden" name="modifyOrder" id="orderId">   
                        <thead>
                            <tr>
                                <td colspan='2'><h2 style="text-align: center">Zgłoszenie nr 2022/<span id="orderHeader"></span></h2> </td>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Data zgłoszenia</td>
                                <td id="orderDate"></td>
                            </tr>
                            <tr>
                                <td>Typ: </td>
                                <td>
                                    <select class="form-select" name="orderType" id="orderType">
                                        <?php
                                    foreach($all_services as $service){
                                        echo "<option value=".$service['id'].">".$service['name']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Komentarz: </td>
                            <td>
                                <textarea name="orderComment" id="orderComment"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Klient: </td>
                            <td id="orderClient"></td>
                        </tr>
                        <tr>
                            <td>Cena netto: </td>
                            <td>
                                <input type="number" name="orderPriceNetto" id="orderPriceNetto">
                            </td>
                        </tr>
                        <tr>
                            <td>VAT: </td>
                            <td>
                                <input type="number" name="orderVat" id="orderVat">
                            </td>
                        </tr>
                        <tr>
                            <td>Status: </td>
                            <td>
                                <select class="form-select" name="orderStatus" id="orderStatus">
                                    <?php
                                    foreach($all_statuses as $status){
                                        echo "<option value=".$status['status_id'].">".$status['name']."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Zapłacono: </td>
                            <td>
                                <select name="orderPayment" id="orderPayment" class="form-select">
                                    <option value="0">Nie</option>
                                    <option value="1">Tak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="mt-2 pt-2 m-0 justify-content-center">
                                    <button type="submit" class="btn btn-success btn-sm">Zatwierdź</button>
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast" onclick="orderPreviewClose()">Zamknij</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    </form>
                    </table>
            </div>
        </div>
    </div>