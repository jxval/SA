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
    $aula = $_POST["aula"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_final = $_POST["hora_final"];
    $profesor = $_POST["profesor"];
    $grupo = $_POST["grupo"];
    $reporte = $_POST["reporte"];
    $primerarevision = $_POST["primerarevision"];
    $segundarevision = $_POST["segundarevision"];
    $tercerarevision = $_POST["tercerarevision"];
    $observaciones = $_POST["observaciones"];

    // Preparar y ejecutar la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO revisiones (id, fecha, turno, aula, hora_inicio, hora_final, modalidad, profesor, grupo, reporte, revision_1, revision_2, revision_3, observaciones, justificado)
            VALUES ('', '$fecha', '$turno', '$aula', '$hora_inicio', '$hora_final', 'presencial', '$profesor', '$grupo', '$reporte', '$primerarevision', '$segundarevision', '$tercerarevision', '$observaciones', 'no')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro guardado correctamente!</div>';
        // echo '<script>alert("Registro guardado correctamente"); window.location = "../layouts/captura.php";</script>';
    } else {
        echo '<div class="alert alert-danger">Hubo un error al guardar los datos, por favor verifica</div>';
        // echo "Error al guardar los datos: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
