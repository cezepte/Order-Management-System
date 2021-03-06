<div class="container" id="companyData">
    <div class="row">
        <div class="col bg-white p-5 border rounded-3 shadow mt-5" style="width: 200%">
            <h2 class="text-center">Informacje o firmie</h2>
            <form action="#" method="post">
                <table class="table mt-5">

                    <tr>
                        <td>Nazwa firmy</td>
                        <td style="text-align: right">
                            <input type="text" name="companyName" id="companyName" placeholder="Wprowadź nazwę" style="width: 100%">
                        </td>
                    </tr>
                    <tr class="mt-3">
                        <td>NIP</td>
                        <td style="text-align: right">
                            <input type="text" name="companyTin" id="companyTin" placeholder="Wprowadź NIP" style="width: 100%">
                        </td>
                    </tr>
                    <tr class="pt-3">
                        <td rowspan="3">Adres</td>
                        <td style="text-align: right">
                            <input type="text" name="companyStreetNumber" id="companyStreetNumber" placeholder="Ulica i numer" style="width: 100%">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right">
                            <input type="text" name="companyPostCode" id="companyPostCode" placeholder="Kod pocztowy" style="width: 100%">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right">
                            <input type="text" name="companyCity" id="companyCity" placeholder="Miejscowość" style="width: 100%">
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-success" style="float:right">Zapisz zmiany</button>
            </form>
        </div>
    </div>
</div>
<script>
    showCompanyData();
</script>