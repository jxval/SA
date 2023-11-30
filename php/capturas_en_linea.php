<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supervsionacad";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $fecha = $_POST["fecha"];
    $turno = $_POST["turno"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_final = $_POST["hora_final"];
    $profesor = $_POST["profesor"];
    $grupo = $_POST["grupo"];
    $reporte = $_POST["reporte"];
    $primerarevision = $_POST["primerarevision"];
    $segundarevision = $_POST["segundarevision"];
    $tercerarevision = $_POST["tercerarevision"];
    $cuartarevision = $_POST["cuartarevision"];
    $observaciones = $_POST["observaciones"];

    $query = "SELECT * FROM revisiones WHERE fecha = '$fecha' AND turno = '$turno' 
    AND hora_inicio = '$hora_inicio' AND hora_final = '$hora_final' 
    AND modalidad = 'linea' AND profesor = '$profesor' AND grupo = '$grupo' 
    AND reporte = '$reporte' AND revision_1 = '$primerarevision' AND revision_2 = '$segundarevision' 
    AND revision_3 = '$tercerarevision' AND revision_4 = '$cuartarevision' AND observaciones = '$observaciones'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        echo '<div class="alert alert-danger">Ya existe un registro con la información ingresada</div>';
    }else{
        // Preparar y ejecutar la consulta SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO revisiones (id, fecha, turno, aula, hora_inicio, hora_final, modalidad, profesor, grupo, reporte, revision_1, revision_2, revision_3, revision_4, observaciones, justificado, toJustify)
                VALUES ('', '$fecha', '$turno', 'N/A', '$hora_inicio', '$hora_final', 'linea' ,'$profesor', '$grupo', '$reporte', '$primerarevision', '$segundarevision', '$tercerarevision', '$cuartarevision', '$observaciones', 'no', 'si')";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success">Registro guardado correctamente!</div>';
        } else {
            echo '<div class="alert alert-danger">Hubo un error al guardar los datos, por favor verifica</div>';
            
        }
    }
    // Cerrar la conexión
    $conn->close();
}
?>
