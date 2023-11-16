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
        echo '<div class="alert alert-success">Registro editado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Hubo un error al guardar los datos, favor de seleccionar datos</div>';
        
    }

    $connection->close();
}
?>