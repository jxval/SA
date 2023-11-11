<?php
session_start();

include('connection.php');

$correo = $_POST['db_correo'];
$contrasena = $_POST['db_contrasena'];
$contrasena = hash('sha512', $contrasena);

$login_validation = mysqli_query($connection, "SELECT * FROM dir_de_carrera WHERE correo = '$correo' AND password = '$contrasena'");

if(mysqli_num_rows($login_validation) > 0){
    $row = $login_validation->fetch_assoc();
    $_SESSION['usuario'] = $row['nom_dir'];
    header("location: ../layouts_directores/dashboard.php");
    exit;
}else{
    echo '<script>
    alert ("Usuario no existe, portal disponible solo para directores");
    window.location = "../layouts_directores/login.php";
    </script>';
    exit;
}

?>