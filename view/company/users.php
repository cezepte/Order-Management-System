<div class="container-fluid mt-5" id="allInvoices">
    <div class="topbar mb-5">
        <div class="text-centered" id="alert-box"></div>
        <h2>Wszyscy użytkownicy</h2>
        <ul style="float: right; clear: both">
            <li><button class="btn btn-primary" onclick="">Dodaj nowego użytkownika</button></li>
        </ul>
    </div>
    <div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="10000">
        <div role="alert" aria-live="assertive" aria-atomic="true"> </div>
    </div>
    <div class="orders-table">
        <table class="table">
            <thead>
                <tr>
                    <td style="width: 10%">Nazwa</td>
                    <td style="width: 20%">Typ</td>
                    <td style="width: 70%">Kontrahent</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($invoices_all as $invoice){
                        $invoice['type'] == "in" ? $invoiceTypeShow = "przychodząca" : $invoiceTypeShow = "wychodząca";
                    ?>
                    <tr>
                        <?php  
                    echo "<td>".$invoice['id']."</td>";
                    echo "<td>".$invoiceTypeShow."</td>";
                    echo "<td>".$invoice['company']."</td>";
                    ?>
                    <td><a href="#" onclick="invoicePreview(<?php echo $invoice['id']; ?>)" class="btn btn-primary">Pokaż</a></td>
                    <td><a href="#" onclick="orderDelete(<?php echo $invoice['id']; ?>)" class="btn btn-success">Edytuj</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>