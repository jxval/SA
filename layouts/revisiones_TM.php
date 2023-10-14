<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Revisiones T.M</title>
</head>
<body>
<h1>Revisiones turno matutino</h1>

<!-- tabla -->
<table class="table table-striped-columns">
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
    </tr>
  </thead>
  <?php 
    include('../php/connection.php');
    $consul = "SELECT * FROM revisiones WHERE turno = 'T.M'";
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
        echo "</tr>";
    echo "</tbody>";
    }
  ?>
</table>
    </tr>
  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script></body>
</html>