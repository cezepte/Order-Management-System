<div class="container-fluid" id="clients">
    <h1 class="text-center">Baza klientów</h1>
    <div class="row">
        <!-- Table of all users -->
        <div class="col-md-8 bg-white shadow p-3 m-4" style="margin-left: 10px; float: left">
        Sortuj 
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 30%">Nazwisko</td>
                        <td style="width: 15%">Imię</td>
                        <td style="width: 45%">Firma</td>
                        <td style="width: 10%">Akcje</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($clients_by_lastname as $client_data){
                            echo "<tr><td>".$client_data['lastName']."</td>";
                            echo "<td>".$client_data['firstName']."</td>";
                            echo "<td>".$client_data['company']."</td>";
                    ?>
                        <td><button class="btn btn-primary client" onclick="$(this).click(function () {$.removeCookie('userId');let userId = $(this).attr('id').replace('client_', '');$.cookie('userId', userId);});" id="client_<?php echo $client_data['client_id']; ?>">Szczegóły</button></td></tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- User preview -->
        <div class="col-md-1" style="width: fit-content"></div>
        <div class="col-md-3 userPreview">
            <div class="card bg-white shadow mt-4" id="client-data-card" style="margin-right: 0px;">
                    <img src="" alt="" class="card-img-top" style="background-color: grey; width: max-content">
                    <div class="card-body">
                        <p class="card-text client-text placeholder-glow">
                            <table class="client-info-table"></table>
                        </p>
                        <div class="actions justify-content-center mt-5">
                            <a href="tel:" tabindex="-1" id="callClient" class="btn btn-success col-5"> Zadzwoń </a>
                            <a href="#" tabindex="-1" id="deleteUser" class="btn btn-danger col-5"> Usuń </a>
                        </div>
    
                    </div>
            </div>
        </div>
    </div>
</div>
