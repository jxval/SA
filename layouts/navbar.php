<link rel="stylesheet" href="../css/style.css">
<!-- <ul class="nav justify-content-center" id="navbar">
  <img class="nav_image" src="../images/LogoUTCJ.png" alt="">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="../layouts/captura.php">Reporte de revisiones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="revisiones_all.php">Concentrado general</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="login.php" aria-disabled="false">Iniciar sesión como administrador</a>
  </li>
</ul>  -->

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="captura.php">
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
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reporte de revisiones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="captura.php">Presencial</a></li>
            <li><a class="dropdown-item" href="captura_en_linea.php">En línea</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Concentrado general
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="revisiones_all.php">Presencial</a></li>
            <li><a class="dropdown-item" href="revisiones_all_linea.php">En línea</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-logout" href="../php/logout_supervisor.php" aria-disabled="false">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>