<?php
include('connection.php');


$correo = $_POST['db_correo'];
$contrasena = $_POST['db_contrasena'];

session_start();
$_SESSION["db_correo"]=$correo;

if (isset($_POST['btn_login'])) {

    $consul = "SELECT * FROM usuarios WHERE correo = '$correo' ";

    $queryusuario = mysqli_query ($connection, $consul);
    $nr = mysqli_num_rows($queryusuario);
    $pass = mysqli_fetch_array($queryusuario);

    if (($nr == 1 ) && (password_verify($contrasena, $pass['contrasena']))) {
        header('location:../layouts_admins/revisiones_all.php');
    }else{
        echo '<script>alert("Usuario o Contraseña Incorrecta:"); window.location = "../layouts/login.php";</script>';
        exit;
    }
}
mysqli_close($connection);

?>