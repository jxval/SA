<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Revisiones T.M</title>
</head>
<body>
    <!-- navbar -->
<?php include ("navbar.php");?>
<h1>Concentrado general</h1>

<form action="" method="GET">
  <div>
    De: <input type="date" name="buscar_date1">
    A: <input type="date" name="buscar_date2">
    <?php require_once '../php/backend-directores.php';?>
      <form action="../php/backend-directores.php" method="POST">
          <!-- <label for="Director">Director</label> -->
          <select id="docente" name="c_director">
            <option value="">Seleccionar profesor</option>
              <?php
              include('../php/connection.php');
              $consul = "SELECT nom_dir FROM dir_de_carrera";
              $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
              
              while($column = mysqli_fetch_array($resul)){
                  $optionname=$column['nom_dir'];
                  echo "<option value='$optionname'>$optionname</option>";
              }
              ?>
          </select>
          <button type="submit" class="btn btn-primary" name="buscar_revi">Search</button>
  </div>
</form>

<!-- tabla -->
<?php
include ('../php/connection.php');

if(isset($_GET['buscar_revi'])){
  ?>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Turno</th>
      <th scope="col">Aula</th>
      <th scope="col">Hora inicio</th>
      <th scope="col">Hora final</th>
      <th scope="col">Profesor</th>
      <th scope="col">Grupo</th>
      <th scope="col">Reporte</th>
      <th scope="col">Revisión 1</th>
      <th scope="col">Revisión 2</th>
      <th scope="col">Revisión 3</th>
      <th scope="col">Observaciones</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $date_1 = $_GET['buscar_date1'];
  $date_2 = $_GET['buscar_date2'];
  $profesor = $_GET['c_director'];
  $query = "SELECT * FROM revisiones WHERE fecha BETWEEN '$date_1' 
  AND '$date_2' OR profesor = '$profesor'";
  $query_run = mysqli_query($connection, $query);

  if(mysqli_num_rows($query_run) > 0){
    foreach($query_run as $items){
      ?>
      <tr>
        <td><?= $items['fecha'];?></td>
        <td><?= $items['turno'];?></td>
        <td><?= $items['aula'];?></td>
        <td><?= $items['hora_inicio'];?></td>
        <td><?= $items['hora_final'];?></td>
        <td><?= $items['profesor'];?></td>
        <td><?= $items['grupo'];?></td>
        <td><?= $items['reporte'];?></td>
        <td><?= $items['revision_1'];?></td>
        <td><?= $items['revision_2'];?></td>
        <td><?= $items['revision_3'];?></td>
        <td><?= $items['observaciones'];?></td>
        <td>Acción</td>
      </tr>
      <?php
    }
  }else{
    ?>
    <tr>
      <td colspan="4">No se encontraron resultados</td>
    </tr>
    <?php
  }
  ?>
  <a href="revisiones_all.php"><button type="submit" class="btn btn-primary">Borrar busqueda</button></a>
  <?php
}else{
  ?>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Turno</th>
      <th scope="col">Aula</th>
      <th scope="col">Hora inicio</th>
      <th scope="col">Hora final</th>
      <th scope="col">Profesor</th>
      <th scope="col">Grupo</th>
      <th scope="col">Reporte</th>
      <th scope="col">Revisión 1</th>
      <th scope="col">Revisión 2</th>
      <th scope="col">Revisión 3</th>
      <th scope="col">Observaciones</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <?php 
    include('../php/connection.php');
    $consul = "SELECT * FROM revisiones";
    $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
    while($column = mysqli_fetch_array($resul)){
    echo "<tbody>";
        echo "<tr>";
        echo "<td>".$column['fecha']."</td>";
        echo "<td>".$column['turno']."</td>";
        echo "<td>".$column['aula']."</td>";
        echo "<td>".$column['hora_inicio']."</td>";
        echo "<td>".$column['hora_final']."</td>";
        echo "<td>".$column['profesor']."</td>";
        echo "<td>".$column['grupo']."</td>";
        echo "<td>".$column['reporte']."</td>";
        echo "<td>".$column['revision_1']."</td>";
        echo "<td>".$column['revision_2']."</td>";
        echo "<td>".$column['revision_3']."</td>";
        echo "<td>".$column['observaciones']."</td>";
        echo "<td><a href=>Justificar</td>";
        echo "</tr>";
    echo "</tbody>";
    }
}
?>



<!-- tabla -->
<!-- <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Aula</th>
      <th scope="col">Hora inicio</th>
      <th scope="col">Hora final</th>
      <th scope="col">Profesor</th>
      <th scope="col">Grupo</th>
      <th scope="col">Reporte</th>
      <th scope="col">Revisión 1</th>
      <th scope="col">Revisión 2</th>
      <th scope="col">Revisión 3</th>
      <th scope="col">Observaciones</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <?php 
    include('../php/connection.php');
    $consul = "SELECT * FROM revisiones";
    $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
    while($column = mysqli_fetch_array($resul)){
    echo "<tbody>";
        echo "<tr>";
        echo "<td>".$column['fecha']."</td>";
        echo "<td>".$column['aula']."</td>";
        echo "<td>".$column['hora_inicio']."</td>";
        echo "<td>".$column['hora_final']."</td>";
        echo "<td>".$column['profesor']."</td>";
        echo "<td>".$column['grupo']."</td>";
        echo "<td>".$column['reporte']."</td>";
        echo "<td>".$column['revision_1']."</td>";
        echo "<td>".$column['revision_2']."</td>";
        echo "<td>".$column['revision_3']."</td>";
        echo "<td>".$column['observaciones']."</td>";
        echo "<td><a href=>Justificar</td>";
        echo "</tr>";
    echo "</tbody>";
    }
  ?>
</table> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>