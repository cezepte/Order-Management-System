<div class="container-fluid bg-light vh-100">
    <div class="row" style="display: flex; justify-content: center; align-items: center;">
        <div class="col-md-4"></div>
        <div class="col-md-4 m-0 border rounded bg-white text-center p-5 mt-5"
        style="display: flex; justify-content: center; align-items: center;">
            <div class="content-box">
                <h1>Zaloguj się</h1>
                <form action="auth.php" method="post">
                    <div class="form-floating mt-5">
                        <input type="text" name="login" id="login" placeholder="Login" class="form-control" required>
                        <label for="login">Login</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" name="pass" id="pass" placeholder="Hasło" class="form-control" required>
                        <label for="pass">Hasło</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Zaloguj</button>
                </form>
            </div>
        </div>
        <div class="col-md-4"></div>
        </div>
    </div>
</div>
