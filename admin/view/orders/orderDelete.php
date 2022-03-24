<div class="toast-container top-50 start-50 translate-middle position-absolute p-3">
 <div role="alert" aria-live="assertive" aria-atomic="true" class="toast shadow bg-white" id="orderDelete">
    <div class="toast-body" >
        <form action="#" method="post">
            <input type="hidden" name="deleteOrder" id="orderDeleteId">   
                <h3>Czy na pewno chcesz usunąć zgłoszenie?</h3>
            <button type="submit" class="btn btn-danger"> Usuń</button>
            <button type="button" class="btn btn-secondary" onclick="document.getElementById('orderDelete').style.display = 'none';">Anuluj</button>
        </form>
    </div>
</div>
</div>