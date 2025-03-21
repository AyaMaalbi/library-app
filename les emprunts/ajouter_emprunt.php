<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="homme.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>Document</title>
</head>
<?php
include("../connexion.php");
// session_start();
// if (!isset($_SESSION["name"]) or $_SESSION["name"] == "") {
//     header("Location: ../login.php");
// }

if (isset($_POST["ajouter"])) {
 
    $id = $_POST["emprunt"];
    $personne = $_POST["personne"];
    $livre = $_POST["livre"];
    $dateE = $_POST["dateE"];
    $DRP = $_POST["DRP"];
    $DRE = $_POST["DRE"];
    $montant = $_POST["montant"];

                    
    $sql = "INSERT INTO `emprunt` ( `emprunt`, `personne`, `livre` ,`DateEmprunt`,`DateRetourPrevue`,`DateRetourEffective`,`MontantEmp`) VALUES ($id,  $personne, $livre ,$dateE,$DRP,$DRE, $montant)";
    $st = $bd->exec($sql);
    if ($st != false) {
        header("Location: list_emprunt.php?msg=ajouté");
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
                    <a class="nav-link" href="../les personnes/list_personnes.php" style="text-transform: capitalize;">les personnes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_emprunt.php" style="text-transform: capitalize;">les emprunts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color: red;text-transform:capitalize">Logout</a>
                </li>


            </ul>
            
        </div>
    </div>
</nav>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <div class="card">

                <div class="card-header">
                    Nouveau emprunt
                </div>
                <div class="card-body">
                   
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">id</label>
                            <input type="number" class="form-control" name="emprunt">
                            

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">personne</label>
                            <select name="personne" id="" class="form-control">
                                <?php
                                   $st = $bd->query("select *from lespersonnes ");
                                   $personne = $st->fetchAll(PDO::FETCH_OBJ);
                                   foreach ($personne as $per) {
                                   ?>
                                    <option value="<?= $per->personne ?>"> <?= $per->nom ?></option>

                                <?php      } ?>
                            </select>
        
                            <!-- <input type="text" name="personne" class="form-control" > -->
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">livre</label>
                            <select name="livre" id="" class="form-control">
                                <?php
                                   $st = $bd->query("select *from leslivre ");
                                   $livre = $st->fetchAll(PDO::FETCH_OBJ);
                                   foreach ($livre as $liv) {
                                   ?>
                                    <option value="<?= $liv->livre ?>"> <?= $liv->titre ?></option>

                                <?php      } ?>
                            </select>
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Date d'Emprunt</label>
                            <input type="date" class="form-control" name="dateE">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Date Retour Prevue</label>
                            <input type="date" class="form-control" name="DRP">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Date Retour Effictive</label>
                            <input type="date" class="form-control" name="DRE">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">montant emprunt</label>
                            <input type="text" class="form-control" name="montant">

                        </div>
                        
                        
                        <button type="submit" name='ajouter' class="btn btn-outline-primary">ajouter</button>

                    </form>
                </div>
            </div>


        </div>
    </div>
</body>

</html>