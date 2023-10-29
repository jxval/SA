<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    require_once("connection.php");

  
    $nomenclatura = $_POST['nomenclatura'];
    $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $director = $_POST['director'];

  
    $sql = "UPDATE carreras SET nom_car='$nomenclatura', nombre='$nombre', nom_dir='$director'
    WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        header('location: ../layouts_admins/carreras.php');
        exit;
    } else {
        echo '<script>alert("Error al Editar:"); window.location = "../layouts_admins/carreras.php";</script>';
        exit;
    }

    $connection->close();
}


?>