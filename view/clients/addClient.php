<div class="container-fluid w-100" id="addClient">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="content-box m-0 border rounded bg-white shadow text-center p-5 mt-5 w-100">
                <h1>Dodaj klienta</h1>
                <form action="#" method="post">
                    <input type="hidden" name="insertClient" value="1">
                    <div class="form-floating mt-2">
                        <input type="text" name="firstName" id="firstName" placeholder="Imię" class="form-control" required>
                        <label for="firstName">Imię</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" name="lastName" id="lastName" placeholder="Nazwisko" class="form-control" required>
                        <label for="lastName">Nazwisko</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" name="company" id="company" placeholder="Firma" class="form-control" >
                        <label for="company">Firma</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="number" name="tin" id="tin" placeholder="NIP" class="form-control">
                        <label for="tin">NIP</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" name="tel_number" id="tel_number" placeholder="Telefon" class="form-control" required>
                        <label for="tel_number">Telefon</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" name="email" id="email" placeholder="E-mail" class="form-control">
                        <label for="email">E-mail</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg mt-3" style="padding-left: 25%; padding-right: 25%;">Dodaj</button>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>