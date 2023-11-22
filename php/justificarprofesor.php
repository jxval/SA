<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once("connection.php");

  
    $comentarios = $_POST['comentarios'];
    $id = $_POST['id'];


  
    $sql = "UPDATE revisiones SET justificado = 'si', comentarios ='$comentarios' WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<script>alert("Registro justificado correctamente"); window.location = "../layouts_directores/revisiones.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error al Editar"); window.location = ""../layouts_directores/revisiones.php";</script>';
        exit;
    }

    $connection->close();
}
?>