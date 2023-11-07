<link rel="stylesheet" href="../css/style.css">
<!-- <ul class="nav justify-content-center" id="navbar">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="dashboard.php">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="revisiones_all.php">Concentrado general</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="incidencias.php">Incidencias más destacadas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="profesores.php">Profesores</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="carreras.php">Carreras</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="directores.php">Directores</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../php/logout.php" aria-disabled="false">Cerrar sesión</a>
  </li>
  <li class="nav-item">
    <strong>Hola <?php echo ucwords($_SESSION['usuario']." ");?></strong>
  </li>
</ul> -->

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">
      <img src="../images/LogoUTCJ.png" alt="" width="50" height="50">
    </a>
    <p class="lead nav_username">
      Hola <?php echo ucwords($_SESSION['usuario']." ");?>
    </p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="revisiones_all.php">Concentrado general</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="incidencias.php">Incidencias más destacadas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profesores.php">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carreras.php">Carreras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="directores.php">Directores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-register" href="../layouts/registros.php">Registrar admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-logout" href="../php/logout.php" aria-disabled="false">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>