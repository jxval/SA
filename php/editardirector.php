<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once("connection.php");

  
    $nomenclatura = $_POST['nomenclatura'];
    $nombres = $_POST['nombres'];
    $id = $_POST['id'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];

  
    $sql = "UPDATE dir_de_carrera SET nom_dir ='$nomenclatura', nombres ='$nombres', primer_apellido ='$primer_apellido', segundo_apellido = '$segundo_apellido'
    WHERE id ='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<script>alert("Registro actualizado correctamente"); window.location = "../layouts_admins/directores.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error al Editar:"); window.location = "../layouts_admins/directores.php";</script>';
        exit;
    }

    $connection->close();
}


?>