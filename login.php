<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
</head>
<?php
include("connexion.php");
session_start();
$msg = "";
if (isset($_POST["login"]) && isset($_POST["password"])) {
    $login = $_POST["login"];
    $pass = $_POST["password"];

    $st = $bd->query("select * from users where name='$login' and password='$pass'");
    $user = $st->fetch();
    if ($user != false) {
        $_SESSION["id"] = $user['id'];
        $_SESSION["username"] = $user['username'];
        header("Location: biblio.php");
    } else {
        $msg = "login ou password incorrect !!!";
    }
}

?>

<body>
    <center>
        <form method="post" style="width: 30%; margin-top: 30px;">
            <div class="mb-3">
                <label for="" class="form-label">login</label>
                <input type="text" class="form-control" name="login" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <p style="color:red"><?= $msg ?> </p>
            <button type="submit" class="btn btn-warning">Connexion</button>

        </form>
    </center>
</body>

</html>