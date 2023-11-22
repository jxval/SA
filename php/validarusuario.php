<?php
session_start();

include('connection.php');

$correo = $_POST['db_correo'];
$contrasena = $_POST['db_contrasena'];
$contrasena = hash('sha512', $contrasena);

$login_validation = mysqli_query($connection, "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'");

if(mysqli_num_rows($login_validation) > 0){
    $row = $login_validation->fetch_assoc();
    $_SESSION['usuario'] = $row['nombre'];
    header("location: ../layouts_admins/dashboard.php");
    exit;
}else{
    echo '<div class="alert alert-danger">Correo y/o contraseña incorrectos, verifica la información</div>';

}

?>