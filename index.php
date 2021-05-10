<?php 
include("./layout/header.php");
include("./db/connexion.php");
$conn = new Connexion();
$db_connexion = $conn->getCONN();








$sql = "SELECT * FROM historique";
$result = $db_connexion->query($sql);

?>

<div class="container">

<h2 class="h2">Ampoules</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Etage</th>
      <th scope="col">Position</th>
      <th scope="col">prix</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
    
    if ($result->num_rows > 0) {

        //adding data to data rray from database
        while($row = $result->fetch_assoc()) {
            
           echo '<tr>';
            echo '<th scope="row">'.$row["id"].'</th>';
            echo '<td>'.$row["date"].'</dt>';
            echo '<td>'.$row["etage"].'</dt>';
            echo '<td>'.$row["position"].'</dt>';
            echo '<td>'.$row["prix"].' EUR</dt>';

             echo '<td style="display:flex">';
                echo '<a class="btn btn-danger" href="http://localhost/ampoules/delete.php?id='.$row['id'].'" ><i class="far fa-trash-alt"></i></a>';
                echo '<a class="btn btn-warning ml-2" href="http://localhost/ampoules/edit.php?id='.$row['id'].'"><i class="far fa-edit"></i></a>';
             echo '</td>';
           echo '<tr>';
        }
    }
    
    ?>
  </tbody>
</table>
</div>

<?php include("./layout/footer.php");?>