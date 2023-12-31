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
    <link rel="icon" href="../images/LogoUTCJ.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Incidencias más destacadas</title>
</head>
<body class="admin_background">
    <!-- navbar -->
<?php include ("navbar.php");?>
<?php include ("../php/connection.php");?>
<h1 class="h1-tittles text-muted">Incidencias más destacadas | Presencial</h1>
<div class="div-table div-filtro">
  <form action="" method="POST">
    <div>
        <figure class="text-center">
            <blockquote class="blockquote">
                <p>Selecciona un rango de fechas y limite para generar las incidencias más destacadas</p>
            </blockquote>
        </figure>
        <div class="lead">
            De: <input type="date" name="buscar_date1" id="date1" class="form-control selectDateAdmin" required>
            A: <input type="date" name="buscar_date2" id="date2" class="form-control selectDateAdmin" required>
            <select class="form-select selectTurnoAdmin" name="turno" id="turno" required>
              <option value="">Seleccionar turno</option>
              <option value="T.M">T.M</option>
              <option value="T.V">T.V</option>
            </select>
            Limite <input type="text" name="limite" id="limite" class="form-control selectDateAdmin" required>
            <button type="submit" class="btn btn-primary btn-enviar-admin" name="top_incidencias" id="enviar">Buscar</button>

        </div>
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
        <th scope="col">Turno</th>
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
    $turno = $_POST['turno'];
    $limite = $_POST['limite'];

    $query = "SELECT revisiones.fecha AS fecha, CONCAT(profesores.primer_apellido, ' ', profesores.nombres) AS Profesor,
                revisiones.turno AS turno,
                SUM(CASE WHEN revisiones.reporte = 'Retardo' THEN 1 ELSE 0 END) AS Retardo,
                SUM(CASE WHEN revisiones.reporte = 'Falta' THEN 1 ELSE 0 END) AS Falta,
                SUM(CASE WHEN revisiones.reporte = 'Salida Antes' THEN 1 ELSE 0 END) AS Salida_antes,
                COUNT(revisiones.reporte) AS total
                FROM revisiones
                JOIN profesores
                ON revisiones.profesor = profesores.id
                WHERE revisiones.fecha BETWEEN '$date_1' AND '$date_2'
                AND turno = '$turno'
                AND modalidad = 'presencial'
                AND justificado = 'no'
                GROUP BY profesores.primer_apellido, profesores.nombres
                ORDER BY total DESC
                LIMIT $limite";

    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0){
      foreach($query_run as $items){
        ?>
        <tr>
          <td><?= $items['fecha'];?></td>
          <td><?= $items['Profesor'];?></td>
          <td><?= $items['turno'];?></td>
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
        <td class="else-results" colspan="7" style="color:red;">No se encontraron resultados</td>
      </tr>
      <?php
    }
    ?>
    <figure class="text-left">
      <blockquote class="blockquote">
      Top <strong><?php echo $limite?></strong> de incidencias del <strong><?php echo $date_1?></strong> al <strong><?php echo $date_2?></strong> del <strong><strong><?php echo $turno?></strong></strong></p>
      </blockquote>
    </figure>
      <a href="incidencias.php"><button type="submit" class="btn btn-danger">Borrar filtro</button></a>
    <br><br>
    <?php

  }

  ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>