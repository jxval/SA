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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/LogoUTCJ.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body class="admin_background">
    <?php include ('navbar.php')?>
    <div class="dashboard-directores">
        <div class="card" style="width: 35rem;">
            <img src="../images/logodashboardDirectores1.png" class="card-img-top" alt="...">
            <div class="card-body card-dashboard-directores">
                <?php include ('../php/connection.php');
                $director = $_SESSION['usuario'];
                $consul = "SELECT COUNT(revisiones.profesor) AS total FROM revisiones
                INNER JOIN profesores ON revisiones.profesor = profesores.id
                INNER JOIN dir_de_carrera ON profesores.director = dir_de_carrera.id WHERE dir_de_carrera.nom_dir = '$director' AND revisiones.modalidad = 'presencial' AND justificado = 'no' AND toJustify = 'si'";
                $resul = mysqli_query($connection, $consul);
                $row = mysqli_fetch_array($resul);?>
                <h1 class="display-5">Concentrado general presencial</h1>
                <h4>Incidencias para justificar <span class="badge bg-secondary"><?php echo $row['total'];?></span></h4>
                <a href="revisiones.php" class="btn btn-primary">Ir a la página </a>
            </div>
        </div>
        <div class="card" style="width: 35rem;">
        <img src="../images/logodashboardDirectores2.png" class="card-img-top" alt="...">
            <div class="card-body card-dashboard-directores">
                <?php include ('../php/connection.php');
                $director = $_SESSION['usuario'];
                $consul = "SELECT COUNT(revisiones.profesor) AS total FROM revisiones
                INNER JOIN profesores ON revisiones.profesor = profesores.id
                INNER JOIN dir_de_carrera ON profesores.director = dir_de_carrera.id WHERE dir_de_carrera.nom_dir = '$director' AND revisiones.modalidad = 'linea' AND justificado = 'no' AND toJustify = 'si'";
                $resul = mysqli_query($connection, $consul);
                $row = mysqli_fetch_array($resul);?>
                <h1 class="display-5">Concentrado general en línea </h1>
                <h4>Incidencias para justificar <span class="badge bg-secondary"><?php echo $row['total'];?></span></h4>
                <a href="revisiones_online.php" class="btn btn-primary">Ir a la página </a>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>