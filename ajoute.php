<?php include("./layout/header.php");

include("./db/connexion.php");
$conn = new Connexion();
$db_connexion = $conn->getCONN();


$date;
$etage;
$position;
$prix;

if(isset($_POST['date']) && isset($_POST['etage']) && isset($_POST['position']) && isset($_POST['prix'])){

$date = $_POST['date'];
$etage = $_POST['etage'];
$position = $_POST['position'];
$prix = $_POST['prix'];
}


if(isset($date) || isset($etage) || isset($position) || isset($prix)){

$sql = "INSERT INTO historique(date, etage, position, prix)
VALUES ('".$date."', '".$etage."', '".$position."', ".$prix.")";

if ($db_connexion->query($sql) === TRUE) {
echo '<div class="alert alert-success" role="alert">
recored added successfully!
</div>';
} else {
echo '<div class="alert alert-danger" role="alert">
something went wronge
</div>';
}


}



?>


<div class="container mt-3">
<h2 class="h2">Ajouter</h2>
<form action="" method="post">
<div class="mb-3">
<label for="date" class="form-label">Date</label>
<input type="date" name="date" class="form-control" id="date">
</div>


<div class="mb-3">
<label for="etage" class="form-label">Etage</label><br>
<select name="etage" class="form-select" id="etage">
<option value="RDC" selected>Rez de chaussé</option>
<option value="première">première</option>
<option value="deuxième">deuxième</option>
<option value="troisème">troisème</option>
<option value="qautrième">qautrième</option>
<option value="cinquième">cinquième</option>
<option value="sixième">sixième</option>
<option value="septième">septième</option>
<option value="huitième">huitième</option>
<option value="neuvième">neuvième</option>
<option value="dixième">dixième</option>
<option value="onzième">onzième</option>
</select>
</div>


<div class="mb-3">
<label for="position" class="form-label">Position</label><br>
<select name="position" class="form-select" id="position">
<option value="gauche" selected>gauche</option>
<option value="droite">droite</option>
<option value="fond">fond</option>
</select>
</div>


<div class="mb-3">
<label for="prix" class="form-label">Prix</label>
<input type="number" name="prix" class="form-control" id="prix">
</div>

<button type="submit" class="btn btn-info">Inserér</button>
</form>
</div>


<?php include("./layout/footer.php")?>