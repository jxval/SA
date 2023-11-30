<?php
session_start();
if(isset($_SESSION['usuario'])){
  header("location: ../layouts/captura.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/LogoUTCJ.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
    <!-- navbar -->
    <?php include ("navbar_logins.php");?>

    <!-- login -->
    <form action="" method="post" class="formulario">
        <?php include('../php/backend-directores.php'); ?>
        <img class="coverimg" src="../images/LogoUTCJ.png" alt="">
        <h3 class="tittle-2">Iniciar sesión Supervisor</h3>
        <input class="input" type="text" name="db_correo" id="" placeholder="Correo" required>
        <br>
        <input class="input pass" type="password" name="db_contrasena" id="" placeholder="Contraseña" required>
        <br>
        <button class="button btn-login" type="submit" name='btn_login_supervisor'>Entrar</button>
    </form>
    <br><br>
    <br>


</body>
</html>