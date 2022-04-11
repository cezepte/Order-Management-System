<div class="container-fluid bg-light" id="home" onload="chartLoad(<?php echo $income; ?>, <?php echo $outcome;?>);">
    <!-- <h1 style="text-align: center">JK Management - sprawy system zarządzania zgłoszeniami</h1> -->
    <div class="row">
        <div class="col-md border rounded-3 shadow bg-white m-4 p-5 align-items-start" id='financeCanvas'>
            <h3 class="text-center mb-3">Twoje finanse</h3>
            <div class="canvas-button-group btn-group mb-3 border d-flex justify-content-center" role="group">
                <button type="submit" class="btn btn-light activable active">Dzisiaj</button>
                <button type="submit" class="btn btn-light">Ostatni tydzień</button>
                <button type="submit" class="btn btn-light">Ostatni miesiąc</button>
            </div> 
            <canvas class="" id="finance" style="float: left"></canvas>
        </div>
        <div class="col-md border rounded-3 shadow bg-white m-4 p-5 align-items-end">
            <h3 class="text-center mb-3">Liczba zamówień</h3>
            <div class="btn-group mb-3 border d-flex justify-content-center" role="group">
                <button type="submit" class="btn btn-light">Dzisiaj</button>
                <button type="submit" class="btn btn-light">Ostatni tydzień</button>
                <button type="submit" class="btn btn-light">Ostatni miesiąc</button>
            </div>
            <canvas id="orderCount"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col shadow border rounded-3 bg-white m-4 p-5">
            <h5>Ostatnie zgłosznia</h5>
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 15%">Typ</td>
                        <td style="width: 50%">Komentarz</td>
                        <td style="width: 20%">Klient</td>
                        <td style="width: 15%">Data</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($orders_last_3 as $order_data){
                        ?>
                        <tr>
                            <?php
                        echo "<td>".$order_data['name']."</td>";
                        echo "<td>".$order_data['comment']."</td>";
                        echo "<td>".$order_data['CLIENT']."</td>";
                        echo "<td>".$order_data['date_c']."</td>";
                        ?>
                        <td><a onclick="orderPreview(<?php echo $order_data['id']; ?>" class="btn btn-success">Zobacz</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    chartLoad(<?php echo $income; ?>, <?php echo $outcome;?>);
</script>