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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body class="admin_background">
    <?php include ('navbar.php')?>
    <div>
        <h1>Página en desarrollo</h1>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Concentrado general presencial</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit odit obcaecati cupiditate ex distinctio aut earum maxime tempore exercitationem, sapiente commodi inventore, doloribus nam mollitia id laborum adipisci voluptatem necessitatibus?</p>
                <a href="revisiones_all.php" class="btn btn-primary">Ir a la página </a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Concentrado general en línea</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit odit obcaecati cupiditate ex distinctio aut earum maxime tempore exercitationem, sapiente commodi inventore, doloribus nam mollitia id laborum adipisci voluptatem necessitatibus?</p>
                <a href="incidencias.php" class="btn btn-primary">Ir a la página </a>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>