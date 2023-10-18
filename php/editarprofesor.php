<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once("connection.php");

  
    $clave = $_POST['clave'];
    $nombres = $_POST['nombres'];
    $primerapellido = $_POST['primerapellido'];
    $segundoapellido = $_POST['segundoapellido'];
    $id = $_POST['id'];
    $correo = $_POST['correo'];
    $director = $_POST['director'];

  
    $sql = "UPDATE maestre SET nombres='$nombres', primer_apellido='$primerapellido', segundo_apellido='$segundoapellido', 
    correo='$correo', director='$director' WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        header('Location: ../layouts_admins/profesores.php');
        exit;
    } else {
        echo '<script>alert("Error al Editar:"); window.location = "../layouts_admins/profesores.php";</script>';
        exit;
    }

    $connection->close();
}
?>