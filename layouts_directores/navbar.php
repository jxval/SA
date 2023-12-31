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
    <a class="navbar-brand" href="../layouts_directores/dashboard.php">
      <img src="../images/LogoUTCJ.png" alt="" height="40">
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
          <a class="nav-link" href="dashboard.php">Inicio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Concentrado general
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="revisiones.php">Presencial</a></li>
            <li><a class="dropdown-item" href="revisiones_online.php">En línea</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration.php">Cambiar contraseña</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-logout" href="../php/logout_director.php" aria-disabled="false">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>