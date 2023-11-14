<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo '<script>
    alert ("Por favor inicia una una sesión");
    window.location = "../layouts/login.php";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body class="admin_background">
    <?php include ('navbar.php')?>
    <div class="dashboard_admins">
        <div class="card" style="width: 30rem; height: 31rem">
            <img src="../images/logodashboardDirectores1.png" class="card-img-top" alt="...">
            <div class="card-body">
                <?php include('../php/connection.php');
                $consul = "SELECT COUNT(revisiones.profesor) AS total_SJ FROM revisiones
                INNER JOIN profesores ON revisiones.profesor = profesores.id
                WHERE revisiones.modalidad = 'presencial' AND justificado = 'no'";
                $resul = mysqli_query($connection, $consul);
                $row = mysqli_fetch_array($resul);

                $consul2 = "SELECT COUNT(revisiones.profesor) AS total_J FROM revisiones
                INNER JOIN profesores ON revisiones.profesor = profesores.id
                WHERE revisiones.modalidad = 'presencial' AND justificado = 'si'";
                $resul2 = mysqli_query($connection, $consul2);
                $row2 = mysqli_fetch_array($resul2);?>
                <h1 class="display-6">Concentrado general presencial</h1>
                <h4>Incidencias sin justificar <span class="badge bg-secondary"><?php echo $row['total_SJ'];?></span></h4>
                <h4>Incidencias justificadas <span class="badge bg-success"><?php echo $row2['total_J'];?></span></h4>
                <a href="revisiones_all.php" class="btn btn-primary">Ir a la página</a>
            </div>
        </div>
        <div class="card" style="width: 30rem; height: 31rem">
            <img src="../images/logodashboardDirectores2.png" class="card-img-top" alt="...">
            <div class="card-body">
                <?php include('../php/connection.php');
                $consul = "SELECT COUNT(revisiones.profesor) AS total_SJ FROM revisiones
                INNER JOIN profesores ON revisiones.profesor = profesores.id
                WHERE revisiones.modalidad = 'linea' AND justificado = 'no'";
                $resul = mysqli_query($connection, $consul);
                $row = mysqli_fetch_array($resul);

                $consul2 = "SELECT COUNT(revisiones.profesor) AS total_J FROM revisiones
                INNER JOIN profesores ON revisiones.profesor = profesores.id
                WHERE revisiones.modalidad = 'linea' AND justificado = 'si'";
                $resul2 = mysqli_query($connection, $consul2);
                $row2 = mysqli_fetch_array($resul2);?>
                <h1 class="display-6">Concentrado general en línea</h1>
                <h4>Incidencias sin justificar <span class="badge bg-secondary"><?php echo $row['total_SJ'];?></span></h4>
                <h4>Incidencias justificadas <span class="badge bg-success"><?php echo $row2['total_J'];?></span></h4>
                <a href="revisiones_all_online.php" class="btn btn-primary">Ir a la página </a>
            </div>
        </div>
        <div class="card" style="width: 30rem; height: 31rem">
            <div class="card-body">
            <h1 class="display-6">10 profesores con más incidencias (universal)</h1>
            <table class="">
                <thead class="">
                    <tr>
                        <th scope="col">Profesor</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- php code -->
                    <?php include('../php/connection.php');
                    $consul = "SELECT CONCAT(profesores.nombres, ' ',profesores.primer_apellido) AS profesor,
                    COUNT(revisiones.reporte) AS total
                    FROM revisiones
                    INNER JOIN profesores ON revisiones.profesor = profesores.id
                    WHERE justificado = 'no'
                    GROUP BY profesores.primer_apellido, profesores.nombres
                    ORDER BY total DESC
                    LIMIT 10;";
                    $resul = mysqli_query($connection, $consul);
                    if(mysqli_num_rows($resul) > 0){
                        foreach($resul as $row){
                            ?>
                            <tr>
                                <td><?= $row['profesor']; ?></td>
                                <td><center><?= $row['total'];?></td></center>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
                <a href="incidencias.php" class="btn btn-primary">Ver detalles (presencial)</a>
                <a href="incidencias_online.php" class="btn btn-primary">Ver detalles (en línea)</a>
            </div>
        </div>
        <div class="card" style="width: 30rem; height: 15rem">
            <div class="card-body">
                <!-- php code -->
                <?php include('../php/connection.php');
                $consul = "SELECT COUNT(*) AS total_profes FROM profesores";
                $resul = mysqli_query($connection, $consul);
                $row = mysqli_fetch_array($resul);?>
                <h1 class="display-6">Profesores</h1>
                <h4>Profesores registrados <span class="badge bg-secondary"><?php echo $row['total_profes'];?></span></h4>
                <a href="profesores.php" class="btn btn-primary">Ir a la página</a>
            </div>
        </div>
        <div class="card" style="width: 30rem; height: 15rem">
            <div class="card-body">
                <!-- php code -->
                <?php include('../php/connection.php');
                $consul = "SELECT COUNT(*) AS total_carreras FROM carreras";
                $resul = mysqli_query($connection, $consul);
                $row = mysqli_fetch_array($resul);?>
                <h1 class="display-6">Carreras</h1>
                <h4>Carreras registradas <span class="badge bg-secondary"><?php echo $row['total_carreras'];?></span></h4>
                <a href="carreras.php" class="btn btn-primary">Ir a la página</a>
            </div>
        </div>
        <div class="card" style="width: 30rem; height: 15rem">
            <div class="card-body">
                <!-- php code -->
                <?php include('../php/connection.php');
                $consul = "SELECT COUNT(*) AS total_directores FROM dir_de_carrera";
                $resul = mysqli_query($connection, $consul);
                $row = mysqli_fetch_array($resul);?>
                <h1 class="display-6">Directores</h1>
                <h4>Directores registrados <span class="badge bg-secondary"><?php echo $row['total_directores'];?></span></h4>
                <a href="directores.php" class="btn btn-primary">Ir a la página</a>
            </div>
        </div>
        <div class="card" style="width: 30rem; height: 15rem">
            <div class="card-body">
                <!-- php code -->
                <?php include('../php/connection.php');
                $consul = "SELECT COUNT(*) AS total_grupos FROM grupos";
                $resul = mysqli_query($connection, $consul);
                $row = mysqli_fetch_array($resul);?>
                <h1 class="display-6">Grupos</h1>
                <h4>Grupos registrados <span class="badge bg-secondary"><?php echo $row['total_grupos'];?></span></h4>
                <a href="grupos.php" class="btn btn-primary">Ir a la página</a>
            </div>
        </div>
        <div class="card" style="width: 30rem; height: 15rem">
            <div class="card-body">
                <!-- php code -->
                <?php include('../php/connection.php');
                $consul = "SELECT COUNT(*) AS total_aulas FROM aulas";
                $resul = mysqli_query($connection, $consul);
                $row = mysqli_fetch_array($resul);?>
                <h1 class="display-6">Aulas</h1>
                <h4>Aulas registradas <span class="badge bg-secondary"><?php echo $row['total_aulas'];?></span></h4>
                <a href="aulas.php" class="btn btn-primary">Ir a la página</a>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>