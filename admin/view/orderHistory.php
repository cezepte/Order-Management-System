<div class="container-fluid mt-5" id="orderHistory">
    <div class="topbar mb-5">
        <h2>Wszystkie zgłoszenia</h2>
        <!-- <ul style="float: right; clear: both">
            <li><button class="btn btn-primary" onclick="$('.content').load('addOrder.php')">Dodaj nowe zlecenie</button></li>
        </ul> -->
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
                $sql = "SELECT * FROM orders WHERE status LIKE 'zakonczona'";
                $query = mysqli_query($conn, $sql);
                if(!empty($query)){
                ?>
                    
                    <h1 style="position: absolute; padding-left: 280px; padding-top: 100px; top: 50%; left: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
                    Historia zakończonych zamówień jest pusta
                    </h1>
                    <?php
                }else{

                    foreach($query as $result){
                        ?>
                    <tr>
                        <?php
                    echo "<td>".$result['id']."</td>";
                    echo "<td>".$result['type']."</td>";
                    echo "<td>".$result['comment']."</td>";
                    echo "<td>".$result['user']."</td>";
                    echo "<td>".$result['status']."</td>";
                    echo "<td>".$result['date_c']."</td>";
                    ?>
                    <td><a href="#" class="btn btn-warning">Edytuj</a></td>
                    <td><a href="#" onclick="showOrderPreview()" class="btn btn-danger">Usuń</a></td>
                </tr>
                <?php
                    }
                }   
                ?>
            </tbody>
        </table>
    </div>
</div>