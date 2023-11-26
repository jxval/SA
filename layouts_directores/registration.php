<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo '<script>
    alert ("Por favor inicia una una sesión");
    window.location = "../layouts_directores/login.php";
    </script>';
    session_destroy();
    die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../images/LogoUTCJ.png" type="image/x-icon">
    <meta name="viewport" content="  width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body class="loginbg">
  
  <form action="" method="post" class="formRe">
    <?php include('../php/backend-directores.php');?>
      <img class="coverimg" src="../images/LogoUTCJ.png" alt="">
      <h3 class="tittle-2">Cambiar contraseña</h3>
      <br>
      <input class="input" type="password" name="nueva_pass1" id="" placeholder="Ingrese nueva contraseña" required>
      <br>
      <input class="input" type="password" name="nueva_pass" id="" placeholder="Confirmar nueva contraseña" required>
      <br>
      <button class="button btn-login" type="submit" name="change_passwordDir">Cambiar</button>
      <a href="revisiones.php" class="a-regi">Regresar</a>
  </form>
    <br><br>
    <br>
       
        
</body>
</html>