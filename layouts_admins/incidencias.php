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
    <title>Incidencias más destacadas</title>
</head>
<body>
    <!-- navbar -->
<?php include ("navbar.php");?>
<?php include ("../php/connection.php");?>
<h1 class="h1-tittles text-muted">Incidencias más destacadas</h1>
<div class="div-table">
  <form action="" method="POST">
    <div>
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>Selecciona un rango de fechas para generar las 10 incidencias más destacadas</p>
            </blockquote>
        </figure>
      De: <input type="date" name="buscar_date1" id="date1" onkeyup="mensajeChange();">
      A: <input type="date" name="buscar_date2" id="date2" onkeyup="mensajeChange();">
          <button type="submit" class="btn btn-primary" name="top_incidencias" id="enviar">Buscar</button>
    </div>
  </form>
  <br>



  <!-- tabla -->
  <?php
  include ('../php/connection.php');

  if(isset($_POST['top_incidencias'])){
    ?>
    <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">Fecha</th>
        <th scope="col">Profesor</th>
        <th scope="col">Retardo</th>
        <th scope="col">Falta</th>
        <th scope="col">Salida antes</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
    <?php

    $date_1 = $_POST['buscar_date1'];
    $date_2 = $_POST['buscar_date2'];

    $query = "SELECT revisiones.fecha AS fecha, CONCAT(profesores.primer_apellido, ' ', profesores.nombres) AS Profesor,
                SUM(CASE WHEN revisiones.reporte = 'Retardo' THEN 1 ELSE 0 END) AS Retardo,
                SUM(CASE WHEN revisiones.reporte = 'Falta' THEN 1 ELSE 0 END) AS Falta,
                SUM(CASE WHEN revisiones.reporte = 'Salida Antes' THEN 1 ELSE 0 END) AS Salida_antes,
                COUNT(revisiones.reporte) AS total
                FROM revisiones
                JOIN profesores
                ON revisiones.profesor = profesores.nomenclatura
                WHERE revisiones.fecha BETWEEN '$date_1' AND '$date_2'
                GROUP BY profesores.primer_apellido, profesores.nombres
                ORDER BY total DESC
                LIMIT 10";

    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0){
      foreach($query_run as $items){
        ?>
        <tr>
          <td><?= $items['fecha'];?></td>
          <td><?= $items['Profesor'];?></td>
          <td><?= $items['Retardo'];?></td>
          <td><?= $items['Falta'];?></td>
          <td><?= $items['Salida_antes'];?></td>
          <td><?= $items['total'];?></td>
        </tr>
        <?php
      }
    }else{
      ?>
      <tr>
        <td colspan="7">No se encontraron resultados</td>
      </tr>
      <?php
    }
    ?>
    <p>Incidencias del <strong><?php echo $date_1?></strong> al <strong> <?php echo $date_2?></strong></p>
    <a href="incidencias.php"><button type="submit" class="btn btn-danger">Borrar busqueda</button></a>
    <br><br>
    <?php

  }

  ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>