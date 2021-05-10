<?php 
include("./layout/header.php");
include("./db/connexion.php");
$conn = new Connexion();
$db_connexion = $conn->getCONN();




$deleteId = $_GET['id'];


$referrer = $_SERVER['HTTP_REFERER'];




$sql = "DELETE FROM historique WHERE id=".$deleteId;

if ($db_connexion->query($sql) === TRUE) {
  
    header('Location:'.$referrer);
}else {

    echo '<div class="alert alert-danger" role="alert">something went wronge</div>';
}





?>