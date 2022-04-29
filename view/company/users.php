<div class="container-fluid mt-5" id="allInvoices">
    <div class="topbar mb-5">
        <div class="text-centered" id="alert-box"></div>
        <h2>Wszyscy użytkownicy</h2>
        <ul style="float: right; clear: both">
            <li><button class="btn btn-primary" onclick="">Dodaj nowego użytkownika</button></li>
        </ul>
    </div>
    <div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="10000">
        <div role="alert" aria-live="assertive" aria-atomic="true"> </div>
    </div>
    <div class="orders-table">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10%">Id</th>
                    <th style="width: 20%">Nazwa</th>
                    <th style="width: 70%">Imię i nazwisko</th>
                </tr>
            </thead>
            <tbody id="usersTable">
            </tbody>
        </table>
    </div>
</div>