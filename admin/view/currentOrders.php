
<div class="container-fluid mt-5" id="currentOrders">
    <div class="topbar mb-5">
        <div class="text-centered" id="alert-box"></div>
        <h2>Lista zgłoszeń w realizacji</h2>
        <ul style="float: right; clear: both">
            <li><button class="btn btn-primary" onclick="$('.content').load('addOrder.php')">Dodaj nowe zlecenie</button></li>
        </ul>
    </div>
    <div class="orders-table">
        <table class="table">
            <thead>
                <tr>
                    <td style="width: 5%">ID</td>
                    <td style="width: 10%">Typ</td>
                    <td style="width: 50%">Komentarz</td>
                    <td style="width: 10%">Klient</td>
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
                    echo "<td>".$order_data['id']."</td>";
                    echo "<td>".$order_data['type']."</td>";
                    echo "<td>".$order_data['comment']."</td>";
                    echo "<td>".$order_data['user']."</td>";
                    echo "<td>".$order_data['status']."</td>";
                    echo "<td>".$order_data['date_c']."</td>";
                    ?>
                    <td><a href="index.php?orderId=<?php echo $order_data['id']; ?>" class="btn btn-warning">Edytuj</a></td>
                    <td><a href="index.php?orderId=<?php echo $order_data['id']; ?>" class="btn btn-danger">Usuń</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>