
<div class="container-fluid mt-5" id="currentOrders">
    <div class="topbar mb-5">
    
        <div class="text-centered" id="alert-box"></div>
        <h2>Lista zgłoszeń w realizacji</h2>
        <ul style="float: right; clear: both">
            <li><button class="btn btn-primary" onclick="">Dodaj nowe zlecenie</button></li>
        </ul>
    </div>
    <div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="10000">
        <div role="alert" aria-live="assertive" aria-atomic="true"> </div>
    </div>
    <div class="orders-table">
        <table class="table">
            <thead>
                <tr>
                    <td style="width: 10%">Typ</td>
                    <td style="width: 45%">Komentarz</td>
                    <td style="width: 20%">Klient</td>
                    <td style="width: 10%">Status</td>
                    <td style="width: 15%">Data</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($orders_by_id_desc as $order_data){
                    ?>
                    <tr>
                        <?php  
                    echo "<td>".$order_data['name']."</td>";
                    echo "<td>".$order_data['comment']."</td>";
                    echo "<td>".$order_data['CLIENT']."</td>";
                    echo "<td>".$order_data['status']."</td>";
                    echo "<td>".$order_data['date_c']."</td>";
                    ?>
                    <td><a href="#" onclick="orderPreview(<?php echo $order_data['id']; ?>)" class="btn btn-warning">Edytuj</a></td>
                    <td><a href="#" onclick="orderDelete(<?php echo $order_data['id']; ?>)" class="btn btn-danger">Usuń</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>