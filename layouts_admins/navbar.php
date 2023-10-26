<link rel="stylesheet" href="../css/style.css">
<ul class="nav justify-content-center" id="navbar">
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
</ul>
