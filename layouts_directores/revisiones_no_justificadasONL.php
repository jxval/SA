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
    <title>Revisiones </title>
</head>
<body class="admin_background">
    <!-- navbar -->
<?php include ("navbar.php");?>
<?php include ("../php/backend-directores.php");?>
<?php include ("../php/connection.php");?>
<h1 class="h1-tittles text-muted">Concentrado general | En línea</h1>
<div class="div-table">
  <form action="" method="POST">
    <div class="lead">
      De: <input type="date" name="buscar_date1" id="date1" class="form-control selectDateAdmin">
      A: <input type="date" name="buscar_date2" id="date2" class="form-control selectDateAdmin">
    <!-- seleccionar profesor -->
      <select class="form-select selectProfeAdmin" id="floatingSelect" aria-label="Floating label select example"  id="docente" name="c_profesor" id="profesor" onkeyup="mensajeChange();">
        <option value="">Seleccionar profesor</option>
          <?php
          
            $director = $_SESSION['usuario'];
          include('../php/connection.php');
          $consul = "SELECT CONCAT(profesores.id, ' ', profesores.nomenclatura) AS nomenclatura
          FROM profesores
          INNER JOIN dir_de_carrera ON profesores.director = dir_de_carrera.id WHERE dir_de_carrera.nom_dir = '$director'";
          $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
          
          while($column = mysqli_fetch_array($resul)){
              $optionname=$column['nomenclatura'];
              echo "<option value='$optionname'>$optionname</option>";
          }
          ?>
      </select>
    <!-- seleccionar turno -->
      <select class="form-select selectTurnoAdmin" id="floatingSelect" aria-label="Floating label select example" name="turno" id="turno">
        <option value="">Seleccionar turno</option>
        <option value="T.M">T.M</option>
        <option value="T.V">T.V</option>
      </select>
    <button type="submit" class="btn btn-primary btn-enviar-admin" name="buscar_revi" id="enviar">Buscar</button>
    <?php
      if(isset($_POST['buscar_revi'])){
        ?>
        <a class="btn-delete-filter" href="revisiones_no_justificadosONL.php"><button type="submit" class="btn btn-danger">Borrar busqueda</button></a>
        <?php

      }
    ?>
    </div>
  </form>
  <!-- tabla -->
  <?php
  include ('../php/connection.php');

  if(isset($_POST['buscar_revi'])){
    ?>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a class="btn btn-primary btn-sm" href="revisiones_online1.php" role="button">Ver justificados</a>
      <a class="btn btn-primary btn-sm" href="revisiones_online.php" role="button">Ver para justificar</a>
    </div>
    <center><strong><h3 class="lead table-tittle">No justificados</h3></strong></center>
    <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">Fecha</th>
        <th scope="col">Turno</th>
        <th scope="col">Horario</th>
        <th scope="col">Profesor</th>
        <th scope="col">Grupo</th>
        <th scope="col">Reporte</th>
        <th scope="col">Revisiones</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
    <?php

    $director = $_SESSION['usuario'];
    $date_1 = $_POST['buscar_date1'];
    $date_2 = $_POST['buscar_date2'];
    $turno = $_POST['turno'];
    $profesor = $_POST['c_profesor'];
    $filtro = '';

  if($date_1 == '' AND $date_2 == '' AND $turno =='' AND $profesor ==''){$filtro;}else{
    if($date_1 !== '' AND $date_2 !== '' AND $turno =='' AND $profesor ==''){$filtro = "AND fecha BETWEEN '$date_1' AND '$date_2'";}
    if($date_1 == '' AND $date_2 == '' AND $turno !=='' AND $profesor ==''){$filtro = "AND turno = '$turno'";}
    if($date_1 == '' AND $date_2 == '' AND $turno =='' AND $profesor !==''){$filtro = "AND profesor = '$profesor'";}
    if($date_1 !== '' AND $date_2 !== '' AND $turno =='' AND $profesor !==''){$filtro = "AND fecha BETWEEN '$date_1' AND '$date_2' AND profesor = '$profesor'";}
    if($date_1 !== '' AND $date_2 !== '' AND $turno !=='' AND $profesor ==''){$filtro = "AND fecha BETWEEN '$date_1' AND '$date_2' AND turno = '$turno'";}
    if($date_1 == '' AND $date_2 == '' AND $turno !=='' AND $profesor !==''){$filtro = "AND profesor = '$profesor' AND turno = '$turno'";}
  }

    $query = "SELECT revisiones.id, revisiones.fecha, revisiones.turno, CONCAT(revisiones.hora_inicio,' - ', revisiones.hora_final) AS horario, 
    profesores.nomenclatura, revisiones.grupo, revisiones.reporte, CONCAT(revisiones.revision_1,', ', revisiones.revision_2,', ', revisiones.revision_3,', ', revisiones.revision_4) AS revisiones, 
    revisiones.observaciones, revisiones.comentarios FROM revisiones
    INNER JOIN profesores ON revisiones.profesor = profesores.id
    INNER JOIN dir_de_carrera ON profesores.director = dir_de_carrera.id WHERE dir_de_carrera.nom_dir = '$director' $filtro AND modalidad = 'linea' AND justificado = 'no' AND toJustify = 'no' ORDER BY id DESC";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0){
      foreach($query_run as $column){
        ?>
        <tr>
          <td class=""><?= $column['fecha'];?></td>
          <td class=""><?= $column['turno'];?></td>
          <td class=""><?= $column['horario'];?></td>
          <td class=""><?= $column['nomenclatura'];?></td>
          <td class=""><?= $column['grupo'];?></td>
          <td class=""><?= $column['reporte'];?></td>
          <td class=""><?= $column['revisiones'];?></td>
          <td class=""><?= $column['observaciones'];?></td>
          <td>
            <button type="button" class="btn btn-primary position-relative btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $column['id']; ?>">
              Justificar
              <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
              </span>
            </button>
          </td>

          <!-- modal editar -->
          <div class="modal fade" id="exampleModal_<?php echo $column['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Justificar profesor <?php echo $column['nomenclatura']; ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body modal-background">
                    <form action="" method="POST">
                    <p class="justify">"<?php echo $column['observaciones'];?>"</p>
                        <div class="mb-2">
                            <label for="recipient-name" class="lead">Comentarios</label>
                            <textarea name="comentarios" class="form-control" id="" value="<?php echo $column['comentarios']; ?>" placeholder="Agrege un comentario de justificación" required></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="recipient-name" name="id" value="<?php echo $column['id']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="guardar_justificacion">Guardar Cambios</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        </tr>
        <?php
      }
    }else{
      ?>
      <tr>
        <td class="else-results" colspan="13" style="color:red;">No se encontraron resultados</td>
      </tr>
      <?php
    }
    ?>
    <?php
  }else{
    ?>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a class="btn btn-primary btn-sm" href="revisiones_online1.php" role="button">Ver justificados</a>
      <a class="btn btn-primary btn-sm" href="revisiones_online.php" role="button">Ver para justificar</a>
    </div>
    <center><strong><h3 class="lead table-tittle">No justificados</h3></strong></center>
    <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">Fecha</th>
        <th scope="col">Turno</th>
        <th scope="col">Horario</th>
        <th scope="col">Profesor</th>
        <th scope="col">Grupo</th>
        <th scope="col">Reporte</th>
        <th scope="col">Revisiones</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
    <?php

    $query = "SELECT revisiones.id, revisiones.fecha, revisiones.turno, CONCAT(revisiones.hora_inicio,' - ', revisiones.hora_final) AS horario, 
    profesores.nomenclatura, revisiones.grupo, revisiones.reporte, CONCAT(revisiones.revision_1,', ', revisiones.revision_2,', ', revisiones.revision_3,', ', revisiones.revision_4) AS revisiones, 
    revisiones.observaciones, revisiones.comentarios FROM revisiones
    INNER JOIN profesores ON revisiones.profesor = profesores.id
    INNER JOIN dir_de_carrera ON profesores.director = dir_de_carrera.id WHERE dir_de_carrera.nom_dir = '$director' AND modalidad = 'linea' AND justificado = 'no' AND toJustify = 'no' ORDER BY id DESC";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0){
      foreach($query_run as $column){
        ?>
        <tr>
          <td class=""><?= $column['fecha'];?></td>
          <td class=""><?= $column['turno'];?></td>
          <td class=""><?= $column['horario'];?></td>
          <td class=""><?= $column['nomenclatura'];?></td>
          <td class=""><?= $column['grupo'];?></td>
          <td class=""><?= $column['reporte'];?></td>
          <td class=""><?= $column['revisiones'];?></td>
          <td class=""><?= $column['observaciones'];?></td>
          <td>
            <button type="button" class="btn btn-primary position-relative btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $column['id']; ?>">
              Justificar
              <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                <span class="visually-hidden">New alerts</span>
              </span>
            </button>
          </td>

          <!-- modal editar -->
          <div class="modal fade" id="exampleModal_<?php echo $column['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Justificar profesor <?php echo $column['nomenclatura']; ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body modal-background">
                    <form action="" method="POST">
                    <p class="justify">"<?php echo $column['observaciones'];?>"</p>
                        <div class="mb-2">
                            <label for="recipient-name" class="lead">Comentarios</label>
                            <textarea name="comentarios" class="form-control" id="" value="<?php echo $column['comentarios']; ?>" placeholder="Agrege un comentario de justificación" required></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="recipient-name" name="id" value="<?php echo $column['id']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="guardar_justificacion">Guardar Cambios</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        </tr>
        <?php
      }
    }else{
      ?>
      <tr>
        <td class="else-results" colspan="13" style="color:green;">No hay registros</td>
      </tr>
      <?php
    }
    ?>
    <?php

  }
  

  ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>