<?php

session_start();
include('connection.php');
$newPassword1 = $_POST['nueva_pass1'];
$newPassword = $_POST['nueva_pass'];

if($newPassword1 === $newPassword){

    $director = $_SESSION['usuario'];
    $newPassword = $_POST['nueva_pass'];
    $newPassword = hash('sha512', $newPassword);

    $sql = "UPDATE dir_de_carrera SET password = '$newPassword' WHERE nom_dir = '$director'";
    if($connection->query($sql) === TRUE){
        echo '<script>
        alert ("La contraseña se cambió con éxito");
        window.location = "../layouts_directores/registration.php";
        </script>';    exit;
    }else{
        echo '<script>
        alert ("Error al cambiar la contraseña");
        window.location = "../layouts_directores/registration.php";
        </script>';
        exit;
    }

}else{
        

    echo '<script>
    alert ("Contraseñas no coinciden");
    window.location = "../layouts_directores/registration.php";
    </script>';
    exit;


}

?>