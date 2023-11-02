<?php
$connection = mysqli_connect("localhost", "root", "", "SUPERVSIONACAD");
$connection -> set_charset("utf8");

if(isset($_POST['guardar'])){
    $nom_dir = $_POST['nom_dir'];
    $nombres = $_POST['nombres'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];

    $connection->query("INSERT INTO dir_de_carrera (nom_dir, nombres, primer_apellido, segundo_apellido) 
    VALUES ('$nom_dir', '$nombres', '$primer_apellido', '$segundo_apellido')") or die($connection->error);

    echo '<script>alert("Registro guardado correctamente"); window.location = "../layouts_admins/directores.php";</script>';
}

if(isset($_POST['guardar_carrera'])){
    $nom_car = $_POST['nom_car'];
    $nombre = $_POST['nombre'];
    $c_director = $_POST['c_director'];

    $connection->query("INSERT INTO carreras (nom_car, nombre, nom_dir) 
    VALUES ('$nom_car', '$nombre', '$c_director')") or die($connection->error);

    echo '<script>alert("Registro guardado correctamente"); window.location = "../layouts_admins/carreras.php";</script>';

}

if(isset($_POST['filtro_carrera'])){
    $ord_nom = $_POST['ord_nom'];
    $ord_nombre = $_POST['ord_nombre'];
    $c_director_c = $_POST['c_director_c'];

    $connection->query("SELECT * FROM carreras ORDER BY '$ord_nom' ASC") or die($connection->error);

    header('location:../layouts/filtro.php');
}

if(isset($_POST['guardar_profesor'])){
    $nomenclatura = $_POST['nomenclatura'];
    $nombres = $_POST['nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $correo = $_POST['correo'];
    $c_director = $_POST['c_director'];

    $connection->query("INSERT INTO profesores (nomenclatura, nombres, primer_apellido, segundo_apellido, correo, director) 
    VALUES ('$nomenclatura', '$nombres', '$primer_apellido', '$segundo_apellido', '$correo', '$c_director')") or die($connection->error);

    echo '<script>alert("Registro guardado correctamente"); window.location = "../layouts_admins/profesores.php";</script>';
}
?>