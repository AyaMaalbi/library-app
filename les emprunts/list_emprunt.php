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




if (isset($_GET["id"])) {

    $id = $_GET["id"];
    $sql = "delete from emprunt where emprunt=$id ";
    $st = $bd->exec($sql);
    if ($st != false) {
        header("Location: list_emprunt.php?msg=supprimé");
    }
}


$sql = "select * from emprunt ";
if (isset($_GET['search'])) {
    $s = $_GET['search'];
    $sql .= " WHERE emprunt like '%$s%' ";
}


$st = $bd->query($sql);
$data = $st->fetchAll(PDO::FETCH_OBJ);


?>

<body style="font-family: Rubik;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="../biblio.php" style="font-weight: 700;color:orange;text-transform:uppercase;">bibliotheque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="ajouter_emprunt.php" style="color:blue;text-transform:capitalize;">ajouter emprunt</a>
                   </li>

                   <li class="nav-item">
                       <a class="nav-link" href="../logout.php" style="color: red;text-transform:capitalize">Logout</a>
                   </li>


                </ul>
                <form action="list_personnes.php" method="get" class="d-flex">
                     <input name='search' class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                     <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
           </div>
        </div>

    </nav>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php if (isset($_GET["msg"])) { ?>
                <div class="alert alert-success" role="alert">
                    <?= $_GET["msg"] . " avec succès !!"  ?>
                </div>
            <?php } ?>
            <div class="card">
                <div class="card-header" style="text-transform: capitalize;font-size:larger;font-weight: 600;text-align:center;color:red;">
                    liste des emprunts
                </div>



                <div class="card-body">

                    <table class="table table-striped">
                        <tr >
                            <td style="text-transform: capitalize;color:gray;">id </td>
                            <td style="text-transform: capitalize;color:gray;"> id personne  </td>
                            <td style="text-transform: capitalize;color:gray;">id livre </td>
                            <td style="text-transform: capitalize;color:gray;">date d'emprunt  </td>
                            <td style="text-transform: capitalize;color:gray;">date retour prevue  </td>
                            <td style="text-transform: capitalize;color:gray;">date retour effictive  </td>
                            <td style="text-transform: capitalize;color:gray;">montant emprunt </td>
                            <td style="text-transform: capitalize;color:gray;">edite  </td>
                            <td style="text-transform: capitalize;color:gray;">delete  </td>
                        </tr>
                        <?php foreach ($data as $emprunt) {

                        ?>

                            <tr>


                                <td><?= $emprunt->emprunt   ?> </td>
                                <td><?= $emprunt->personne  ?> </td>

                                <td> <?= $emprunt->livre  ?> </td>
                                <td> <?= $emprunt->DateEmprunt   ?> </td>
                               
                                <td> <?= $emprunt->DateRetourPrevue   ?> </td>
                                <td> <?= $emprunt->DateRetourEffective   ?> </td>
                                <td> <?= $emprunt->MontantEmp   ?> </td>
                                
                                


                                <td>
                                    <a class="btn btn-outline-success" href="edite_emprunt.php?id=<?= $emprunt->emprunt  ?>">Edit</a>
                                </td>
                                <td>
                                <a class="btn btn-outline-danger" href="list_emprunt.php?id=<?= $emprunt->emprunt  ?>" onclick="return confirm('vous allez varaiment supprimé cette emprunt')">delete</a>
                            
                                </td>

                            </tr>

                        <?php } ?>



                    </table>
                </div>
            </div>


        </div>
    </div>
</body>
</body>
</html>