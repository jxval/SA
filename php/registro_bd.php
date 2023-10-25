<?php
include('connection.php');

$nombre = $_POST['db_nombre'];
$apellido = $_POST['db_apellido'];
$correo = $_POST['db_correo'];
$contrasena = $_POST['db_contrasena'];
$contrasena = hash('sha512', $contrasena);



$sql = "INSERT INTO usuarios (id, nombre, apellido, correo, contrasena) 
Values ('', '$nombre', '$apellido', '$correo', '$contrasena')";
 if ($connection->query($sql) === TRUE) {
    header('Location: ../layouts/login.php');
        exit;
} else {
    echo '<script>alert("Error al Registrarse:"); window.location = "../layouts/registro.php";</script>';
        exit;
}


mysqli_close($connection);

?>