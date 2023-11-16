<?php
$connection = mysqli_connect("localhost", "root", "", "SUPERVSIONACAD");
$connection -> set_charset("utf8");

if(isset($_POST['guardar_director'])){
    $nom_dir = $_POST['nom_dir'];
    $nombres = $_POST['nombres'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $correo = $_POST['correo'];
    $password = $_POST['contrasena'];
    $password = hash('sha512', $password);

    $query = "SELECT * FROM dir_de_carrera WHERE correo = '$correo'";
    $result = $connection->query($query);


    if($result->num_rows > 0){
        echo '<div class="alert alert-danger">Ya existe un director con la información ingresada</div>';        
    }else{
        $sql = "INSERT INTO dir_de_carrera (nom_dir, nombres, primer_apellido, segundo_apellido, correo, password) 
        VALUES ('$nom_dir', '$nombres', '$primer_apellido', '$segundo_apellido', '$correo', '$password')";
        if($connection->query($sql) === TRUE){
            echo '<div class="alert alert-success">Registro agregado correctamente!</div>';        
        }else{
            echo '<div class="alert alert-danger">Hubo un error, verifica datos ingresados</div>';
        }
    }

    $connection->close();
}
if(isset($_POST['editar_director'])){
    $nomenclatura = $_POST['nomenclatura'];
    $nombres = $_POST['nombres'];
    $id = $_POST['id'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $correo = $_POST['correo'];

    $sql = "UPDATE dir_de_carrera SET nom_dir ='$nomenclatura', nombres ='$nombres', primer_apellido ='$primer_apellido', segundo_apellido = '$segundo_apellido', 
    correo = '$correo' WHERE id ='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro editado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Hubo un error, verifica datos ingresados</div>';
    }

    $connection->close();
}
if(isset($_POST['eliminar_director'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM dir_de_carrera WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro eliminado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }
    $connection->close();
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
if(isset($_POST['editar_carrera'])){
    $nomenclatura = $_POST['nomenclatura'];
    $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $director = $_POST['director'];

    $sql = "UPDATE carreras SET nom_car='$nomenclatura', nombre='$nombre', nom_dir='$director'
    WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro editado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Error: Favor de completar el formulario</div>';
    }

    $connection->close();
}
if(isset($_POST['eliminar_carrera'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM carreras WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro eliminado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }
    $connection->close();
}

if(isset($_POST['guardar_profesor'])){
    $nomenclatura = $_POST['nomenclatura'];
    $nombres = $_POST['nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $correo = $_POST['correo'];
    $c_director = $_POST['c_director'];

    $query = "SELECT * FROM profesores WHERE correo = '$correo'";
    $result = $connection->query($query);

    if($result->num_rows > 0){
        echo '<div class="alert alert-danger">Este profesor ya ha sido registrado</div>';        
    }else{
        $sql = "INSERT INTO profesores (nomenclatura, nombres, primer_apellido, segundo_apellido, correo, director) 
        VALUES ('$nomenclatura', '$nombres', '$primer_apellido', '$segundo_apellido', '$correo', '$c_director')";
        if($connection->query($sql) === TRUE){
            echo '<div class="alert alert-success">Registro agregado correctamente!</div>';        
        }else{
            echo '<div class="alert alert-danger">Hubo un error, verifica datos ingresados</div>';
        }
    }

    $connection->close();
}

if(isset($_POST['editar_profesor'])){
    $nomenclatura = $_POST['nomenclatura'];
    $nombres = $_POST['nombres'];
    $primerapellido = $_POST['primerapellido'];
    $segundoapellido = $_POST['segundoapellido'];
    $id = $_POST['id'];
    $correo = $_POST['correo'];
    $director = $_POST['director'];

    $sql = "UPDATE profesores SET nomenclatura = '$nomenclatura', nombres='$nombres', primer_apellido='$primerapellido', segundo_apellido='$segundoapellido', 
    correo='$correo', director='$director' WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro editado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Favor de completar el formulario</div>';
    }

    $connection->close();
}

if(isset($_POST['borrar_profesor'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM profesores WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro eliminado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }
    $connection->close();
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