<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Concentrado general</title>
</head>
<body class="captura_background">
    <!-- navbar -->
<?php include ("navbar.php");?>
<h1 class="h1-tittles text-muted">Concentrado General En Linea</h1>
<div class="div-table">
<!-- tabla -->
<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Turno</th>
      <th scope="col">Hora inicio</th>
      <th scope="col">Hora final</th>
      <th scope="col">Profesor</th>
      <th scope="col">Grupo</th>
      <th scope="col">Reporte</th>
      <th scope="col">Revisión 1</th>
      <th scope="col">Revisión 2</th>
      <th scope="col">Revisión 3</th>
      <th scope="col">Observaciones</th>
    </tr>
  </thead>
  <?php 
    include('../php/connection.php');
    $consul = "SELECT revisiones.id, revisiones.fecha, revisiones.turno, revisiones.hora_inicio, revisiones.hora_final, 
    profesores.nomenclatura, revisiones.grupo, revisiones.reporte, revisiones.revision_1, revisiones.revision_2, revisiones.revision_3, 
    revisiones.observaciones FROM revisiones 
    INNER JOIN profesores ON  revisiones.profesor = profesores.id WHERE modalidad = 'Linea' ORDER BY id DESC";
    $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
    while($column = mysqli_fetch_array($resul)){
    echo "<tbody>";
        echo "<tr>";
        echo "<td>".$column['fecha']."</td>";
        echo "<td>".$column['turno']."</td>";
        echo "<td>".$column['hora_inicio']."</td>";
        echo "<td>".$column['hora_final']."</td>";
        echo "<td>".$column['nomenclatura']."</td>";
        echo "<td>".$column['grupo']."</td>";
        echo "<td>".$column['reporte']."</td>";
        echo "<td>".$column['revision_1']."</td>";
        echo "<td>".$column['revision_2']."</td>";
        echo "<td>".$column['revision_3']."</td>";
        echo "<td>".$column['observaciones']."</td>";
        echo "</tr>";
    echo "</tbody>";
    }
  ?>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script></body>
</html>