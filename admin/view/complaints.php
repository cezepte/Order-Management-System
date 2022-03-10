<?php
    $host = "localhost";
    $login = "root";
    $pass = "root";
    $db = "serwis_test";

    $conn = mysqli_connect($host,$login,$pass,$db);
    if(isset($_GET['logOut'])){
        unset($_COOKIE['login']);
    }
    include 'alerts.php';
?>
<div class="container-fluid mt-5" >

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
                    <td style="width: 10%">ID zgłoszenia</td>
                    <td style="width: 50%">ID Klienta</td>
                    <td style="width: 10%">Komentarz</td>
                    <td style="width: 10%">Status</td>
                    <td style="width: 15%">Data</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM complaints";
                $query = mysqli_query($conn, $sql);
                foreach($query as $result){
                    ?>
                    <tr>
                        <?php
                    echo "<td>".$result['id']."</td>";
                    echo "<td>".$result['order_id']."</td>";
                    echo "<td>".$result['client_id']."</td>";
                    echo "<td>".$result['comment']."</td>";
                    echo "<td>".$result['status']."</td>";
                    echo "<td>".$result['date_c']."</td>";
                    ?>
                    <td><a href="index.php?orderId=<?php echo $result['id']; ?>" class="btn btn-warning">Edytuj</a></td>
                    <td><a href="index.php?orderId=<?php echo $result['id']; ?>" class="btn btn-danger">Usuń</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>