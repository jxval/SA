<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once("connection.php");

    $fecha = $_POST['fecha'];
    $turno = $_POST['turno'];
    $aula = $_POST['aula'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_final = $_POST['hora_final'];
    $modalidad = $_POST['modalidad'];
    $profesor = $_POST['profesor'];
    $grupo = $_POST['grupo'];
    $reporte = $_POST['reporte'];
    $revision_1 = $_POST['revision_1'];
    $revision_2 = $_POST['revision_2'];
    $revision_3 = $_POST['revision_3'];
    $revision_4 = $_POST['revision_4'];
    //$revision_4 = $_POST['revision_4'];
    $id = $_POST['id'];
    $observaciones = $_POST['observaciones'];
    

    $sql = "UPDATE revisiones SET fecha = '$fecha', turno = '$turno', aula = '$aula', 
    hora_inicio = '$hora_inicio', hora_final = '$hora_final', modalidad = '$modalidad',profesor = '$profesor', grupo = '$grupo', reporte ='$reporte', 
    revision_1='$revision_1', revision_2='$revision_2', revision_3='$revision_3', revision_4 = '$revision_4',
    observaciones ='$observaciones' WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<script>alert("Registro editado correctamente"); window.location = "../layouts_admins/concentrado.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error al editar, favor de llenar el formulario correctamente"); window.location = "../layouts_admins/concentrado.php";</script>';
    }

    $connection->close();
}
?>