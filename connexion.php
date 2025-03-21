<?php

$dsn = "mysql:host=localhost;dbname=bibliotheque";
$user = "root";
$pass = '';

try {
    $bd = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "Erreur :" . $e->getMessage();
}