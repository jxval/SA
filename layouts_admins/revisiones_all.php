<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo '<script>
    alert ("Por favor inicia una una sesión");
    window.location = "../layouts/login.php";
    </script>';
    session_destroy();
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Revisiones </title>
</head>
<body>
    <!-- navbar -->
<?php include ("navbar.php");?>
<?php include ("../php/connection.php");?>
<h1 class="h1-tittles text-muted">Concentrado general</h1>
<div class="div-table">
  <form action="" method="POST">
    <div>
      De: <input type="date" name="buscar_date1" id="date1" onkeyup="mensajeChange();">
      A: <input type="date" name="buscar_date2" id="date2" onkeyup="mensajeChange();">
            <!-- <label for="Director">Director</label> -->
          <select id="docente" name="c_profesor" id="profesor" onkeyup="mensajeChange();">
            <option value="">Seleccionar profesor</option>
              <?php
              include('../php/connection.php');
              $consul = "SELECT nomenclatura FROM profesores";
              $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
              
              while($column = mysqli_fetch_array($resul)){
                  $optionname=$column['nomenclatura'];
                  echo "<option value='$optionname'>$optionname</option>";
              }
              ?>
          </select>
          <select name="turno" id="turno" onkeyup="mensajeChange();">
            <option value="">Seleccionar turno</option>
            <option value="T.M">T.M</option>
            <option value="T.V">T.V</option>
          </select>
          <button type="submit" class="btn btn-primary" name="buscar_revi" id="enviar">Buscar</button>
    </div>
  </form>
  <form action="../php/exportacion_excel.php" method="POST">
    <button type="submit" name="export" class="btn btn-success" >Exportar a Excel</button>  
    </form>
  <br>



  <!-- tabla -->
  <?php
  include ('../php/connection.php');

  if(isset($_POST['buscar_revi'])){
    ?>
    <table class="table table-bordered">
    <thead class="table-dark">
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

    $date_1 = $_POST['buscar_date1'];
    $date_2 = $_POST['buscar_date2'];
    $turno = $_POST['turno'];
    $profesor = $_POST['c_profesor'];
    $filtro = '';

  if($date_1 == '' AND $date_2 == '' AND $turno =='' AND $profesor ==''){$filtro;}else{
    if($date_1 !== '' AND $date_2 !== '' AND $turno =='' AND $profesor ==''){$filtro = "WHERE fecha BETWEEN '$date_1' AND '$date_2'";}
    if($date_1 == '' AND $date_2 == '' AND $turno !=='' AND $profesor ==''){$filtro = "WHERE turno = '$turno'";}
    if($date_1 == '' AND $date_2 == '' AND $turno =='' AND $profesor !==''){$filtro = "WHERE profesor = '$profesor'";}
    if($date_1 !== '' AND $date_2 !== '' AND $turno =='' AND $profesor !==''){$filtro = "WHERE fecha BETWEEN '$date_1' AND '$date_2' AND profesor = '$profesor'";}
    if($date_1 !== '' AND $date_2 !== '' AND $turno !=='' AND $profesor ==''){$filtro = "WHERE fecha BETWEEN '$date_1' AND '$date_2' AND turno = '$turno'";}
    if($date_1 == '' AND $date_2 == '' AND $turno !=='' AND $profesor !==''){$filtro = "WHERE profesor = '$profesor' AND turno = '$turno'";}
  }

    $query = "SELECT * FROM revisiones $filtro ORDER BY fecha DESC";
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
          <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_">Justificar</button>
          </td>
        </tr>
        <?php
      }
    }else{
      ?>
      <tr>
        <td colspan="13">No se encontraron resultados</td>
      </tr>
      <?php
    }
    ?>
    <a href="revisiones_all.php"><button type="submit" class="btn btn-danger">Borrar busqueda</button></a>
    <br><br>
    <?php
  }else{
    ?>
    <table class="table table-bordered">
    <thead class="table-dark">
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
      $consul = "SELECT * FROM revisiones ORDER BY fecha DESC";
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
          ?>
          <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_">Justificar</button>
          </td>
          <?php
          echo "</tr>";
      echo "</tbody>";
      }
  }

  ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>