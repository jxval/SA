<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Carreras</title>
</head>
<body>
<!-- navbar -->
<?php include ("navbar.php");?>
<h1>Carreras</h1>
    <!-- Button trigger modal -->
    <a href="carreras.php"><button class="btn btn-primary">Borrar filtro</button></a>
<!-- tabla -->
<table class="table table-striped-columns">
  <thead>
    <tr>
      <th scope="col">Nomenclatura</th>
      <th scope="col">Nombre</th>
      <th scope="col">Director</th>
    </tr>
  </thead>
  <?php 
    include('../php/connection.php');
    $ord_nombre = $_POST['ord_nombre'];
    $c_director_c = $_POST['c_director_c'];
    $consul = "SELECT * FROM carreras WHERE nom_dir = '$c_director_c' ORDER BY nombre $ord_nombre";
    $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
    while($column = mysqli_fetch_array($resul)){
    echo "<tbody>";
        echo "<tr>";
        echo "<td>".$column['nom_car']."</td>";
        echo "<td>".$column['nombre']."</td>";
        echo "<td>".$column['nom_dir']."</td>";
        echo "</tr>";
    echo "</tbody>";
    }
  ?>
</table>
    </tr>
  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>