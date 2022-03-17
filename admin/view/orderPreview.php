<div class="container-fluid" id="orderPreview">
    <table class="table">
    <?php
    foreach($query as $result){
        echo "<tr><td><strong>ID zgłoszenia</strong></td><td>".$result['id']."</td></tr>";
        echo "<tr><td><strong>Rodzaj zgłoszenia</strong></td><td>".$result['type']."</td></tr>";
        echo "<tr><td><strong>Komentarz</strong></td><td>".$result['comment']."</td></tr>";
        echo "<tr><td><strong>Klient</strong></td><td>".$order_data['lastName']." ".$order_data['firstName']."</td></tr>";
        echo "<tr><td><strong>Status</strong></td><td>".$result['status']."</td></tr>";
        echo "<tr><td><strong>Data</strong></td><td>".$result['date_c']."</td></tr>";
    }
    ?>
    </table>   
</div>