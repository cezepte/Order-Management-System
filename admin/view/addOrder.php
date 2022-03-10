
<div class="container-fluid w-100">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <div class="content-box m-0 border rounded bg-white shadow text-center p-5 mt-5 w-100">
                <h1>Dodaj zgłoszenie</h1>
                <form action="#" method="post">
                    <input type="hidden" name="action" value="insert">
                    <select class="form-select form-select-lg mt-5" name="type">
                        <option selected value="naprawa">Naprawa</option>
                        <option value="instalacja">Instalacja</option>
                        <option value="czyszczenie">Czyszczenie</option>
                        <option value="doradztwo">Doradztwo</option>
                        <option value="zakup">Zakup</option>
                    </select>
                    <div class="form-floating mt-2">
                        <input type="text" name="comment" id="comment" placeholder="Komentarz" class="form-control" required>
                        <label for="comment">Komentarz</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="text" name="user" id="user" placeholder="Klient" class="form-control" required>
                        <label for="user">Klient</label>
                    </div>
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
                    <select class="form-select form-select-lg mt-2" name="status">
                        <option selected value="przyjeta">Przyjęta</option>
                        <option value="zdiagnozowana">Zdiagnozowana</option>
                        <option value="w trakcie naprawy">W trakcie naprawy</option>
                        <option value="naprawiona">Naprawiona</option>
                        <option value="zakonczona">Wysłana/odebrana</option>
                    </select>
                    <button type="submit" class="btn btn-success btn-lg mt-3" style="padding-left: 25%; padding-right: 25%;">Dodaj</button>
                </form>
            </div>
        </div>

        <div class="col-md-3"></div>
    </div>
</div>