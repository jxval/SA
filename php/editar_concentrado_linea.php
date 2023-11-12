<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once("connection.php");

  
    $profesor = $_POST['profesor'];
    $reporte = $_POST['reporte'];
    $revision_2 = $_POST['revision_2'];
    $revision_3 = $_POST['revision_3'];
    $revision_4 = $_POST['revision_4'];
    $id = $_POST['id'];
    $observaciones = $_POST['observaciones'];

    $sql = "UPDATE revisiones SET profesor = '$profesor', reporte ='$reporte', revision_2='$revision_2', revision_3='$revision_3', revision_4 = '$revision_4', 
    observaciones ='$observaciones' WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<script>alert("Registro editado correctamente"); window.location = "../layouts/revisiones_all_linea.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error al Editar, por favor verifique nombre de profesor"); window.location = "../layouts/revisiones_all_linea.php";</script>';
        exit;
    }

    $connection->close();
}
?>