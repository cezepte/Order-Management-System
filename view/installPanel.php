<?php
include '../model/database1.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Install Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-light">
    
<div class="container">
    <div class="row align-items-center">
        <div class="col align-self-center bg-white border rounded p-5 m-5">
<?php
    if(isset($_POST['adminName'])){
        $username = $_POST['adminName'];
        $password = $_POST['adminPass'];
        global $db;
        $query = "INSERT INTO users(username,password,role) VALUES(:username, :password, 'admin')";
        $statement = $db->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->bindValue(":password", $password);
        $statement->execute();
        if($statement->closeCursor()){
            echo "Gratulacje! Instalacja przebiegła pomyślnie. <a href='../index.php'>Kliknij tutaj</a> aby przejść do panelu administratora!";
        }
    }else if(isset($_POST['dbHost'])){
        $host = $_POST['dbHost'];
        $user = $_POST['dbUserName'];
        $pass = $_POST['dbPass'];
        $db = $_POST['dbName'];

        $dsn = "mysql:host=".$host.";dbname=".$db;
        try{
            $conn = new PDO ($dsn, $user, $pass);
            if($conn){
                $file = fopen("../model/database.php", "w");
                $txt = "
<?php
\$dsn = 'mysql:host=".$host.";dbname=".$db."';
\$username = '".$user."';
\$password = '".$pass."';

try{
    \$db = new PDO(\$dsn,\$username,\$password);

}catch(PDOException \$e){
    \$error_message = 'Database Error: ';
    \$error_message .= \$e->getMessage();
    include('view/error.php');

    exit();
}";
                fwrite($file, $txt);
                global $conn;
                $query = file_get_contents("create_tables.sql");
                $statement = $conn->prepare($query);
                $statement->execute();
            ?>
            <h1>Jeszcze jeden krok!</h1>
            <p>Utwórz konto użytkownika, za pomocą którego będziesz się logować do systemu!</p>
            <form action="#" method="post">
                <div class="form-floating mt-5">
                    <input type="text" name="adminName" id="adminName" placeholder="Nazwa użytkownika" class="form-control" required>
                    <label for="adminName">Nazwa użytkownika</label>
                </div>
                <div class="form-floating mt-5">
                    <input type="password" name="adminPass" id="adminPass" placeholder="Hasło" class="form-control" required>
                    <label for="adminPass">Hasło</label>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success mt-5">
                        Przejdź dalej 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </button>
                </div>
            </form>
            <?php
            }
        }catch(PDOException $e){    
            $error = "Wystąpił błąd!";
            $error .= $e->getMessage();
            exit();
        }
    }else{
?>
            <h1 class="text-center">Witaj w systemie zarządzania zgłoszeniami!</h1>
            <p class="text-center">Wprowadź informacje potrzebne do poprawnego działania systemu</p>
            <form action="#" method="post">
                <div class="form-floating mt-5">
                    <input type="text" name="dbHost" id="dbHost" placeholder="Nazwa bazy danych" class="form-control" required>
                    <label for="dbHost">Adres hosta</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="text" name="dbUserName" id="dbUserName" placeholder="Nazwa użytkownika" class="form-control" required>
                    <label for="dbUserName">Nazwa użytkownika</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="text" name="dbPass" id="dbPass" placeholder="Hasło" class="form-control" required>
                    <label for="dbPass">Hasło</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="text" name="dbName" id="dbName" placeholder="Nazwa bazy danych" class="form-control" required>
                    <label for="dbName">Nazwa bazy danych</label>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success mt-5">
                        Przejdź dalej 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </button>
                </div>
            </form>
        <?php
    }
    ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>