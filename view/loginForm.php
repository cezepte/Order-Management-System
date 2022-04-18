<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaloguj się</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-light vh-100">
        <div class="row" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-md-4"></div>
            <div class="col-md-4 m-0 border rounded bg-white text-center p-5 mt-5" style="display: flex; justify-content: center; align-items: center;">
                <div class="content-box">
                    <h1>Zaloguj się</h1>
                    <form action="model/auth.php" method="post">
                        <div class="form-floating mt-5">
                            <input type="text" name="login" id="login" placeholder="Login" class="form-control" required>
                            <label for="login">Login</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input type="password" name="pass" id="pass" placeholder="Hasło" class="form-control" required>
                            <label for="pass">Hasło</label>
                        </div>
                        <div class="justify-content-end align-self-end">
                            <button type="submit" class="btn btn-success mt-3">Zaloguj</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

