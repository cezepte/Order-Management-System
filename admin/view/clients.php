<div class="container-fluid" id="clients">
    <h1 class="text-center">Baza klientów</h1>
    <div class="row">
        <!-- Table of all users -->
        <div class="col-md-8 bg-white shadow p-3 m-4" style="margin-left: 10px; float: left">
            <table class="table">
                <thead>
                    <tr>
                        <td style="width: 10%">ID</td>
                        <td style="width: 15%">Imię</td>
                        <td style="width: 20%">Nazwisko</td>
                        <td style="width: 20%">Firma</td>
                        <td style="width: 15%">Nr tel</td>
                        <td style="width: 20%">E-mail</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($clients_by_lastname as $client_data){
                            echo "<tr class='activable'><td>".$client_data['id']."</td>";
                            echo "<td>".$client_data['firstName']."</td>";
                            echo "<td>".$client_data['lastName']."</td>";
                            echo "<td>".$client_data['company']."</td>";
                            echo "<td>".$client_data['tel_number']."</td>";
                            echo "<td>".$client_data['email']."</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- User preview -->
        <div class="col-md-1" style="width: fit-content"></div>
        <div class="col-md-3" style="margin-right: 0px; float: right">
            <div class="card vh-25 bg-white shadow mt-4" style="margin-right: 0px;">
                <img src="" alt="" class="card-img-top" style="background-color: grey; width: max-content">
                <div class="card-body">
                    <h5 class="card-title placeholder-glow">
                        <span class="placeholder col-6"></span>
                    </h5>
                    <p class="card-text placeholder-glow">
                        <span class="placeholder col-7"></span>
                        <span class="placeholder col-4"></span>
                        <span class="placeholder col-4"></span>
                        <span class="placeholder col-6"></span>
                        <span class="placeholder col-8"></span>
                    </p>
                    <div class="justify-content-center mt-5">

                        <a href="#" tabindex="-1" class="btn btn-success disabled placeholder col-5"></a>
                        <a href="#" tabindex="-1" class="btn btn-danger disabled placeholder col-5"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>