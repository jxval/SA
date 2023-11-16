<?php
$connection = mysqli_connect("localhost", "root", "", "SUPERVSIONACAD");
$connection -> set_charset("utf8");

if(isset($_POST['guardar'])){
    $nom_dir = $_POST['nom_dir'];
    $nombres = $_POST['nombres'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $correo = $_POST['correo'];
    $password = $_POST['contrasena'];
    $password = hash('sha512', $password);

    $sql = ("INSERT INTO dir_de_carrera (nom_dir, nombres, primer_apellido, segundo_apellido, correo, password) 
    VALUES ('$nom_dir', '$nombres', '$primer_apellido', '$segundo_apellido', '$correo', '$password')") or die($connection->error);

}

if(isset($_POST['guardar_carrera'])){
    $nom_car = $_POST['nom_car'];
    $nombre = $_POST['nombre'];
    $c_director = $_POST['c_director'];

    $sql = ("INSERT INTO carreras (nom_car, nombre, nom_dir) 
    VALUES ('$nom_car', '$nombre', '$c_director')") or die($connection->error);

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro agregado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Favor de completar el formulario</div>';
        
    }
}

if(isset($_POST['guardar_profesor'])){
    $nomenclatura = $_POST['nomenclatura'];
    $nombres = $_POST['nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $correo = $_POST['correo'];
    $c_director = $_POST['c_director'];

    $sql = ("INSERT INTO profesores (nomenclatura, nombres, primer_apellido, segundo_apellido, correo, director) 
    VALUES ('$nomenclatura', '$nombres', '$primer_apellido', '$segundo_apellido', '$correo', '$c_director')") or die($connection->error);

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro agregado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Favor de completar el formulario</div>';
        
    }
}
if(isset($_POST['guardar_grupo'])){
    $grupo = $_POST['grupo'];

    $connection->query("INSERT INTO grupos (grupo) 
    VALUES ('$grupo')") or die($connection->error);

    echo '<script>alert("Registro guardado correctamente"); window.location = "../layouts_admins/grupos.php";</script>';
}
if(isset($_POST['guardar_aula'])){
    $aula = $_POST['aula'];

    $connection->query("INSERT INTO aulas (aula) 
    VALUES ('$aula')") or die($connection->error);

    echo '<script>alert("Registro guardado correctamente"); window.location = "../layouts_admins/aulas.php";</script>';
}
?>