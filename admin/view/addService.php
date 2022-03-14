<?php
$host = "localhost";
$login = "root";
$pass = "root";
$db = "serwis_test";

$conn = mysqli_connect($host,$login,$pass,$db);
?>
<div class="container-fluid w-100" id="addService">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="content-box m-0 border shadow rounded bg-white text-center p-5 mt-5 w-100">
                <h1>Dodaj usługę</h1>
                <form action="addServiceBack.php" method="post" class="mt-5">
                    <!-- <select class="form-select form-select-lg mt-5" name="type">
                        <option selected value="naprawa">Naprawa</option>
                        <option value="instalacja">Instalacja</option>
                        <option value="czyszczenie">Czyszczenie</option>
                        <option value="doradztwo">Doradztwo</option>
                        <option value="zakup">Zakup</option>
                    </select> -->
                    <div class="form-floating mt-2">
                        <input type="text" name="serviceName" id="serviceName" placeholder="Nazwa usługi" class="form-control" required>
                        <label for="serviceName">Nazwa usługi</label>
                    </div>
                    <div class="form-floating mt-2">
                        <textarea class="form-control" name="description" id="description" cols="65" rows="8" placeholder="Opis usługi"></textarea>
                        <label for="description">Opis usługi</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="number" name="vat" id="vat" placeholder="Podatek VAT" class="form-control" required>
                        <label for="price">Podatek VAT</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg mt-3" style="padding-left: 25%; padding-right: 25%;">Dodaj</button>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php
    if(isset($_POST['type'])){
        $type = $_POST['type'];
        $comment = $_POST['comment'];
        $user = $_POST['user'];
        $price = $_POST['price'];
        $vat = $_POST['vat'];
        $status = $_POST['status'];
        
        $sql = "INSERT INTO orders(type,comment,user,netto_price,vat,status) VALUES ('$type','$comment','$user','$price','$vat','$status')";

        $query = mysqli_query($conn, $sql);
        $query;
    }else{

    }
?>