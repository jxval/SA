<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <title>Top 10</title>
</head>
<body>
    <br><br><br>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  
    <tr>
      <th scope="col">Profesor</th>
      <th scope="col">Retardo</th>
      <th scope="col">Falta</th>
      <th scope="col">Salida Antes</th>
      <th scope="col">Incidencias</th>
    </tr>
    <?php foreach ($row AS $row){
        require_once("../php/connection.php");

        $sql = "SELECT CONCAT(maestros.primer_apellido, ' ', maestros.nombres) AS PROFESOR,
                SUM(CASE WHEN revisiones.reporte = 'Retardo' THEN 1 ELSE 0 END) AS RETARDO,
                SUM(CASE WHEN revisiones.reporte = 'Falta' THEN 1 ELSE 0 END) AS FALTA,
                SUM(CASE WHEN revisiones.reporte = 'Salida Antes' THEN 1 ELSE 0 END) AS `SALIDA ANTES`,
                COUNT(revisiones.reporte) AS incidencias
                FROM revisiones
                JOIN maestros
                ON revisiones.profesor = maestros.clave
                GROUP BY maestros.primer_apellido, maestros.nombres
                LIMIT 10;";
                

        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["PROFESOR"] . "</td>
                        <td>" . $row["RETARDO"] . "</td>
                        <td>" . $row["FALTA"] . "</td>
                        <td>" . $row["SALIDA ANTES"] . "</td>
                        <td>" . $row["incidencias"] . "</td>
                    </tr>";
            }
        } else {
            echo "0 results";
        }
        $connection->close();
    }
        ?>
  
  
</table>
</body>
</html>