
<div class="container-fluid w-100" id="addOrder">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="content-box m-0 border rounded bg-white shadow text-center p-5 mt-5 w-100">
                <h1>Dodaj zgłoszenie</h1>
                <form action="#" method="post">
                    <input type="hidden" name="insertOrder" value="1">
                    <select class="form-select form-select-lg mt-5" name="type">
                        <?php
                        foreach($all_services as $service){
                            echo "<option value='".$service['id']."'>".$service['name']."</option>";
                        }
                        ?>
                    </select>
                    <div class="form-floating mt-2">
                        <input type="text" name="comment" id="comment" placeholder="Komentarz" class="form-control" required>
                        <label for="comment">Komentarz</label>
                    </div>
                    <select class="form-select form-select-lg mt-2" name="clients_id">
                        <option selected>Wybierz klienta...</option>
                        <?php
                        foreach($clients_by_lastname as $client_data){
                            echo "<option value=".$client_data['client_id'].">".$client_data['lastName']." ".$client_data['firstName']."</option>";
                        }
                        ?>
                    </select>
                    <div class="form-floating mt-2">
                        <input type="number" name="price" id="price" placeholder="Cena netto" class="form-control" required>
                        <label for="price">Cena netto</label>
                    </div>
                    <select class="form-select form-select-lg mt-2" name="vat">
                        <option selected value="23">VAT 23%</option>
                        <option value="8">VAT 8%</option>
                        <option value="5">VAT 5%</option>
                        <option value="0">VAT 0%</option>
                    </select>
                    <select name="payed" id="" class="form-select form-select-lg mt-2">
                        <option selected value="0">niezapłacone</option>
                        <option value="1">zapłacone</option>
                    </select>
                    <select class="form-select form-select-lg mt-2" name="status">
                        <?php
                        foreach($all_statuses as $status){
                            echo "<option value=".$status['status_id'].">".$status['name']."</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-success btn-lg mt-3" style="padding-left: 25%; padding-right: 25%;">Dodaj</button>
                </form>
            </div>
        </div>

        <div class="col-md-3"></div>
    </div>
</div>