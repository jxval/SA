<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once("connection.php");

  
    $nomenclatura = $_POST['nomenclatura'];
    $nombres = $_POST['nombres'];
    $primerapellido = $_POST['primerapellido'];
    $segundoapellido = $_POST['segundoapellido'];
    $id = $_POST['id'];
    $correo = $_POST['correo'];
    $director = $_POST['director'];

  
    $sql = "UPDATE profesores SET nomenclatura = '$nomenclatura', nombres='$nombres', primer_apellido='$primerapellido', segundo_apellido='$segundoapellido', 
    correo='$correo', director='$director' WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro editado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Favor de completar el formulario</div>';
    }

    $connection->close();
}


?>