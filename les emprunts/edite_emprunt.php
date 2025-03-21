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

if (isset($_GET["id"]) && $_GET["id"] != '') {

    $id = $_GET["id"];
    $sql = "select *  from emprunt where emprunt=$id ";
    $st = $bd->query($sql);
    if ($st == false) {
        header("Location: list_emprunt.php?msg=err_id");
    }
    $emprunt = $st->fetch();
}

if (isset($_POST['Enregistrer'])) {
    // $emprunt = $_POST['emprunt'];
    $personne = $_POST["personne"];
    $livre = $_POST["livre"];
    $dateE = $_POST["dateE"];
    echo $dateE ;
    $DRP = $_POST["DRP"];
    $DRE = $_POST["DRE"];
    $montant = $_POST["montant"];
    echo $DRE ;
    echo $DRE ;


    $sql = "UPDATE  `emprunt` SET `personne`='$personne', `livre`='$livre', `DateEmprunt`='$dateE', `DateRetourPrevue`='$DRP' ,`DateRetourEffective`='$DRE', `MontantEmp`=$montant where emprunt=$id";
    $st = $bd->exec($sql);
    if ($st == true) {
        header("Location: list_emprunt.php?msg=modifié");
    }
}


?>




<body >
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
                    Modifier emprunt
                </div>
                <div class="card-body">
                    
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">id</label>
                            <input type="text" name="emprunt" value="<?= $emprunt['emprunt'] ?>" class="form-control" disabled>

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">personne</label>
                            <select class="form-control" name="personne" id="">
                                <?php
                                $st = $bd->query("select * from lespersonnes ");
                                $personne = $st->fetchAll(PDO::FETCH_OBJ);
                                foreach ($personne as $per) {
                                ?>
                                    <option <?= ($per->personne == $emprunt['personne']) ? "selected"  : ''    ?> value="<?= $per->personne ?>"><?= $per->nom ?> </option>

                                <?php      } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">livre</label>
                            <select class="form-control" name="livre" id="">
                                <?php
                                $st = $bd->query("select * from leslivre ");
                                $livres = $st->fetchAll(PDO::FETCH_OBJ);
                                foreach ($livres as $liv) {
                                ?>
                                    <option <?= ($liv->livre == $emprunt['livre']) ? "selected"  : ''    ?> value="<?= $liv->livre ?>"><?= $liv->titre ?></option>

                                <?php      } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">DateEmprunt</label>
                            <input type="date" name="dateE" value="<?= $emprunt['DateEmprunt'] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Date Retour Prevue</label>
                            <input type="date" name="DRP" value="<?= $emprunt['DateRetourPrevue'] ?>" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">DateRetourEffective</label>
                            <input type="date" name="DRE" value="<?= $emprunt['DateRetourEffective'] ?>" class="form-control" >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">MontantEmp</label>
                            <input type="text" name="montant" value="<?= $emprunt['MontantEmp'] ?>" class="form-control" >
                        </div>


                       

                        <button type="submit" name='Enregistrer' class="btn btn-primary">Enregistrer</button>

                    </form>
                </div>
            </div>


        </div>
    </div>
</body>

</html>