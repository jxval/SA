<?php
session_start();
if(isset($_SESSION['usuario'])){
  header("location: ../layouts_directores/dashboard.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="  width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/LogoUTCJ.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body class="">
  <!-- navbar -->
  <?php include ("../layouts/navbar_logins.php");?>

<form action="" method="post" class="formulario">
        <?php include('../php/backend-directores.php'); ?>
        <img class="coverimg" src="../images/LogoUTCJ.png" alt="">
        <h3 class="tittle-2">Iniciar sesión Director</h3>
        <input class="input" type="text" name="db_correo" id="" placeholder="Correo" required>
        <br>
        <input class="input pass" type="password" name="db_contrasena" id="" placeholder="Contraseña" required>
        <br>
        <button class="button btn-login" type="submit" name='btn_login_director'>Entrar</button>
        
    </form>
    <br><br>
    <br>
       
        
</body>
</html>