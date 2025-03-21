<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="homme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.css">
</head>
<?php
include("../connexion.php");
// session_start();
// if (!isset($_SESSION["login"]) or $_SESSION["password"] == "") {
//     header("Location: ../login.php");
// }

if (isset($_POST["ajouter"])) {
 
    $personne = $_POST["personne"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $dateN = $_POST["dateN"];
    

                    
    $st = $bd->exec("INSERT INTO `lespersonnes` ( `personne`, `nom`, `prenom` ,`datenaissance`) VALUES ($personne, ' $nom',' $prenom' ,$dateN)");
    if ($st != false) {
        header("Location: list_personnes.php?msg=ajouté");
    }
}

?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="../biblio.php" style="font-weight: 700;color:orange;text-transform:uppercase;">bibliotheque</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="../les livres/list_livres.php" style="text-transform: capitalize;">les livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_personnes.php" style="text-transform: capitalize;">les personnes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../les emprunts/list_emprunt.php" style="text-transform: capitalize;">les emprunts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color: red;text-transform:capitalize">Logout</a>
                </li>


            </ul>
            <form action="listbibio.php" method="get" class="d-flex">
                <input name='search' class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    Nouveau personne 
                </div>
                <div class="card-body">
                    
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">id</label>
                            <input type="number" class="form-control" name="personne">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">nom</label>
                            
        
                            <input type="text" name="nom" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">prenom</label>
                            <input type="text" name="prenom" class="form-control" >

                            
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Date naissance</label>
                            <input type="date" class="form-control" name="dateN">

                        </div>
                       
                        
                        
                        <button type="submit" name='ajouter' class="btn btn-outline-primary">ajouter</button>

                    </form>
                </div>
            </div>


        </div>
    </div>
</body>

</html>