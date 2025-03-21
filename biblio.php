<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
    <style>
        center{
            display: flex;
            justify-content: space-evenly;
        }
    </style>

</head>
<?php
include("navbar.php");
// session_start();

// if (!isset($_SESSION["password"]) or $_SESSION["password"] == "") {
//     header("Location: login.php");
// }
?>
<body>
    <center>
    <div class="card" style="width: 18rem;">
     <img src="livres.jpg" class="card-img-top" style="overflow:hidden;">
     <div class="card-body">
          <h5 class="card-title">list des livres</h5>
          <a href="#" class="btn btn-primary">Go</a>
     </div>
  </div>

  <div class="card" style="width: 18rem;">
     <img src="personne.png" class="card-img-top" style="overflow:hidden;">
     <div class="card-body">
          <h5 class="card-title">list des personnes</h5>
          <a href="#" class="btn btn-primary">Go</a>
     </div>
  </div>

  <div class="card" style="width: 18rem;">
     <img src="..." class="card-img-top" style="overflow:hidden;">
     <div class="card-body">
          <h5 class="card-title">list des emprunt</h5>
          <a href="#" class="btn btn-primary">Go</a>
     </div>
  </div>
 
    </center>
   
</body>
</html>