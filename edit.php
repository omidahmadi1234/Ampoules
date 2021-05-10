<?php
include("./layout/header.php");
include("./db/connexion.php");
$conn = new Connexion();
$db_connexion = $conn->getCONN();

$modifyId = $_GET['id'];

$data = Array();
if($modifyId){

$sql = "SELECT * FROM historique where id=". $modifyId;
$result = $db_connexion->query($sql);

$data = $result->fetch_assoc();

}

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

$sql = "UPDATE historique SET date='".$date."', etage='".$etage."', position='".$position."', prix=".$prix." WHERE id=".$modifyId;

if ($db_connexion->query($sql) === TRUE) {
echo '<div class="alert alert-success" role="alert">
recored updated successfully!
</div>';
} else {
echo '<div class="alert alert-danger" role="alert">
something went wronge
</div>';

echo $sql;
echo $db_connexion->error;
}
}


?>


<div class="container mt-3">
<h2 class="h2">Modifier</h2>
<form action="" method="post">
<div class="mb-3">
<label for="date" class="form-label">Date</label>
<input type="date" name="date" value="<?php echo $data['date'];?>"class="form-control" id="date">
</div>


<div class="mb-3">
<label for="etage" class="form-label">Etage</label><br>
<select name="etage" class="form-select" id="etage">

<option value="<?php echo $data["etage"]?>" selected> <?php echo $data["etage"]?></option>
<option value="RDC">Rez de chaussé</option>
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

<option value="<?php echo $data["position"]?>" selected> <?php echo $data["position"]?></option>
<option value="gauche">gauche</option>
<option value="droite">droite</option>
<option value="fond">fond</option>
</select>
</div>


<div class="mb-3">
<label for="prix" class="form-label">Prix</label>
<input type="number" name="prix" value="<?php echo $data['prix'];?>" class="form-control" id="prix">
</div>

<button type="submit" class="btn btn-info">sauvgarder</button>
</form>

</div>


<?php include("./layout/footer.php");?>