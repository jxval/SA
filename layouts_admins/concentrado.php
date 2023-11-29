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
    <link rel="icon" href="../images/LogoUTCJ.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Concentrado general</title>
</head>
<body class="admin_background">
    <!-- navbar -->
<?php include ("navbar.php");?>
<h1 class="h1-tittles text-muted">Concentrado general universal</h1>

<div class="div-table">
  <form action="" method="POST">
    <div class="lead">
      De: <input type="date" name="buscar_date1" id="date1" class="form-control selectDateAdmin">
      A: <input type="date" name="buscar_date2" id="date2" class="form-control selectDateAdmin">
    <!-- seleccionar profesor -->
      <select class="form-select selectProfeAdmin" id="floatingSelect" aria-label="Floating label select example"  id="docente" name="c_profesor" id="profesor" onkeyup="mensajeChange();">
        <option value="">Seleccionar profesor</option>
          <?php
          include('../php/connection.php');
          $consul = "SELECT CONCAT(id, ' ', nomenclatura) AS nomenclatura FROM profesores";
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
        <a class="btn-delete-filter" href="concentrado.php"><button type="submit" class="btn btn-danger btn-delete-filter">Borrar busqueda</button></a>
        <?php
      }
    ?>
    </div>
  </form>
  <br>
  <!-- tabla -->
  <?php
  include ('../php/connection.php');

  if(isset($_POST['buscar_revi'])){
    ?>
    <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">Fecha</th>
        <th scope="col">Turno</th>
        <th scope="col">Aula</th>
        <th scope="col">Hora_I</th>
        <th scope="col">Hora_F</th>
        <th scope="col">Modalidad</th>
        <th scope="col">Profesor</th>
        <th scope="col">Grupo</th>
        <th scope="col">Reporte</th>
        <th scope="col">R1</th>
        <th scope="col">R2</th>
        <th scope="col">R3</th>
        <th scope="col">R4</th>
        <th scope="col">Observaciones</th>
        <th scope="col">Accion</th>
        
      </tr>
    </thead>
    <tbody>
    <?php

    $date_1 = $_POST['buscar_date1'];
    $date_2 = $_POST['buscar_date2'];
    $turno = $_POST['turno'];
    $profesor = $_POST['c_profesor'];
    $filtro = '';

  if($date_1 == '' AND $date_2 == '' AND $turno =='' AND $profesor ==''){$filtro;}else{
    if($date_1 !== '' AND $date_2 !== '' AND $turno =='' AND $profesor ==''){$filtro = "WHERE fecha BETWEEN '$date_1' AND '$date_2'";}
    if($date_1 == '' AND $date_2 == '' AND $turno !=='' AND $profesor ==''){$filtro = "WHERE turno = '$turno'";}
    if($date_1 == '' AND $date_2 == '' AND $turno =='' AND $profesor !==''){$filtro = "WHERE profesor = '$profesor'";}
    if($date_1 !== '' AND $date_2 !== '' AND $turno =='' AND $profesor !==''){$filtro = "WHERE fecha BETWEEN '$date_1' AND '$date_2' AND profesor = '$profesor'";}
    if($date_1 !== '' AND $date_2 !== '' AND $turno !=='' AND $profesor ==''){$filtro = "WHERE fecha BETWEEN '$date_1' AND '$date_2' AND turno = '$turno'";}
    if($date_1 == '' AND $date_2 == '' AND $turno !=='' AND $profesor !==''){$filtro = "WHERE profesor = '$profesor' AND turno = '$turno'";}
  }

    $query = "SELECT revisiones.id, revisiones.fecha, revisiones.turno, revisiones.aula, 
    revisiones.hora_inicio, revisiones.hora_final, 
    revisiones.modalidad, profesores.nomenclatura, revisiones.grupo, revisiones.reporte, 
    revisiones.revision_1,revisiones.revision_2, revisiones.revision_3, revisiones.revision_4, 
    revisiones.observaciones FROM revisiones
    INNER JOIN profesores ON revisiones.profesor = profesores.id $filtro  ORDER BY id DESC";
    $query_run = mysqli_query($connection, $query);
    ?>
    <?php
    if(mysqli_num_rows($query_run) > 0){
      foreach($query_run as $items){
        ?>
        
        <tr>
          <td><?php echo $items['fecha'];?></td>
          <td><?php echo $items['turno'];?></td>
          <td><?php echo $items['aula'];?></td>
          <td><?php echo $items['hora_inicio'];?></td>
          <td><?php echo $items['hora_final'];?></td>
          <td><?php echo $items['modalidad'];?></td>
          <td><?php echo $items['nomenclatura'];?></td>
          <td><?php echo $items['grupo'];?></td>
          <td><?php echo $items['reporte'];?></td>
          <td><?php echo $items['revision_1'];?></td>
          <td><?php echo $items['revision_2'];?></td>
          <td><?php echo $items['revision_3'];?></td>
          <td><?php echo $items['revision_4'];?></td>
          <td><?php echo $items['observaciones'];?></td>
          <td>
                <img src="../images/editar.png" alt="Editar" class="btn-img" data-bs-toggle="modal" data-bs-target="#exampleModalfiltro_<?php echo $items['id']; ?>" onclick="openModal('<?php echo $items['id']; ?>', 'editar')">
                <img src="../images/eliminar.png" alt="Eliminar" class="btn-img" data-bs-toggle="modal" data-bs-target="#borrar_<?php echo $items['id']; ?>" onclick="openModal('<?php echo $items['id']; ?>', 'eliminar')">
            </td>
        </tr>

                <!-- Modal editar -->
                <div class="modal fade" id="exampleModalfiltro_<?php echo $items['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar reporte de <?php echo $items['nomenclatura']; ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body modal-background">
                            <form action="../php/editar_concentrado_general.php" method="POST">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Fecha</label>
                                    <input type="date" class="form-control" id="recipient-name" name="fecha" value="<?php echo $items['fecha']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Turno</label>
                                    <input type="text" class="form-control" id="recipient-name" name="turno" value="<?php echo $items['turno']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Aula</label>
                                    <input type="text" class="form-control" id="recipient-name" name="aula" value="<?php echo $items['aula']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Horario Inicial</label>
                                    <input type="text" class="form-control" id="recipient-name" name="hora_inicio" value="<?php echo $items['hora_inicio']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Horario Final</label>
                                    <input type="text" class="form-control" id="recipient-name" name="hora_final" value="<?php echo $items['hora_final']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Modalidad</label>
                                    <input type="text" class="form-control" id="recipient-name" name="modalidad" value="<?php echo $items['modalidad']; ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label">Profesor <label style="color:red;">(Selecciona un profesor)</label></label>
                                    <div class="form-floating">
                                      <select class="form-select" id="floatingSelect" aria-label="Floating label select example" id="profesor" value="<?php echo $items['nomenclatura']; ?>" name="profesor" required>
                                          <option selected > Seleccione un Profesor</option>
                                          <?php
                                              include('../php/connection.php');
                                              $consul = "SELECT CONCAT(id, ' ', nomenclatura) AS profesor FROM profesores ORDER BY nomenclatura ASC";
                                              $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
                                              
                                              while($column = mysqli_fetch_array($resul)){
                                                  $optionname=$column['profesor'];
                                                  echo "<option value='$optionname'>$optionname</option>";
                                              }
                                          ?> 
                                      </select>
                                      <label for="floatingSelect">Profesor</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Grupo</label>
                                    <input type="text" class="form-control" id="recipient-name" name="grupo" value="<?php echo $items['grupo']; ?>">
                                </div>
                                <div class="mb-3">
                                  <label for="recipient-name" class="col-form-label">Reporte</label>
                                  <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" id="profesor" value="<?php echo $items['reporte']; ?>" name="reporte" required>
                                      <option selected>Seleccionar reporte</option>
                                      <option value="Retardo"<?php if($items['reporte']=="Retardo") echo 'selected="selected"';?>>Retardo</option>
                                      <option value="Falta"<?php if($items['reporte']=="Falta") echo 'selected="selected"';?>>Falta</option>
                                      <option value="Salida antes"<?php if($items['reporte']=="Salida antes") echo 'selected="selected"';?>>Salida antes</option>
                                    </select>
                                    <label for="floatingSelect">Reporte</label>
                                  </div>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="recipient-name" name="id" value="<?php echo $items['id']; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Revision 1</label>
                                    <input type="time" class="form-control" id="recipient-name" name="revision_1" value="<?php echo $items['revision_1']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Revision 2</label>
                                    <input type="time" class="form-control" id="recipient-name" name="revision_2" value="<?php echo $items['revision_2']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Revision 3</label>
                                    <input type="time" class="form-control" id="recipient-name" name="revision_3" value="<?php echo $items['revision_3']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Revision 4</label>
                                    <input type="time" class="form-control" id="recipient-name" name="revision_4" value="<?php echo $items['revision_4']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Observaciones</label>
                                    <input type="text" class="form-control" id="recipient-name" name="observaciones" value="<?php echo $items['observaciones']; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                                <!-- Modal de eliminar  -->
                                <form action="../php/eliminar_concentrado.php" method="post">
                <div class="modal fade" id="borrar_<?php echo $items['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            Seguro que desea eliminar el reporte para <?php echo $items['nomenclatura']; ?>?
                        <input type="hidden" name="id" value="<?php echo $items['id']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </div>
                    </div>
                </div>
                </div>
                </form>

         
        
      <?php
      }
    }
    else{
      ?>
      <tr>
        <td class="else-results" colspan="13" style="color:red;">No se encontraron resultados</td>
      </tr>
      
      <?php
    }
    
  }else{
    ?>
  <form action="../php/backend-directores.php" method="POST">
    <button type="submit" name="export_universal" class="btn btn-success btn-sm" >Exportar a Excel</button>  
  </form>
  <br>
<!-- tabla -->
<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Turno</th>
      <th scope="col">Aula</th>
      <th scope="col">Hora_I</th>
      <th scope="col">Hora_F</th>
      <th scope="col">Modalidad</th>
      <th scope="col">Profesor</th>
      <th scope="col">Grupo</th>
      <th scope="col">Reporte</th>
      <th scope="col">R1</th>
      <th scope="col">R2</th>
      <th scope="col">R3</th>
      <th scope="col">R4</th>
      <th scope="col">Observaciones</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include('../php/connection.php');
    $consul = "SELECT revisiones.id, revisiones.fecha, revisiones.turno, revisiones.aula, 
    revisiones.hora_inicio,revisiones.hora_final, revisiones.modalidad,
    profesores.nomenclatura, revisiones.grupo, revisiones.reporte, 
    revisiones.revision_1,revisiones.revision_2, revisiones.revision_3, revisiones.revision_4,
    revisiones.observaciones FROM revisiones
    INNER JOIN profesores ON revisiones.profesor = profesores.id  ORDER BY id DESC";
    $result = mysqli_query($connection, $consul) or die ("Algo salio mal");
    
    if(mysqli_num_rows($result) > 0){
        foreach($result as $row){
          ?>
            <tr>
              <td><?php echo $row["fecha"]; ?></td>
              <td><?php echo $row["turno"];?></td>
              <td><?php echo $row["aula"]; ?></td>
              <td><?php echo $row["hora_inicio"];?></td>
              <td><?php echo $row["hora_final"];?></td>
              <td><?php echo $row["modalidad"];?></td>
              <td><?php echo $row["nomenclatura"];?></td>
              <td><?php echo $row["grupo"]; ?></td>
              <td><?php echo $row["reporte"]; ?></td>
              <td><?php echo $row["revision_1"]; ?></td>
              <td><?php echo $row["revision_2"]; ?></td>
              <td><?php echo $row["revision_3"]; ?></td>
              <td><?php echo $row["revision_4"]; ?></td>
              <td><?php echo $row["observaciones"]; ?></td>
              <td>
                <img src="../images/editar.png" alt="Editar" class="btn-img" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>" onclick="openModal('<?php echo $row['id']; ?>', 'editar')">
                <img src="../images/eliminar.png" alt="Eliminar" class="btn-img" data-bs-toggle="modal" data-bs-target="#borrar_<?php echo $row['id']; ?>" onclick="openModal('<?php echo $row['id']; ?>', 'eliminar')">

              </td>
            </tr>

                <!-- Modal editar -->
                <div class="modal fade" id="exampleModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar reporte de  <?php echo $row['nomenclatura']; ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body modal-background">
                            <form action="../php/editar_concentrado_general.php" method="POST">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Fecha</label>
                                    <input type="date" class="form-control" id="recipient-name" name="fecha" value="<?php echo $row['fecha']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Turno</label>
                                    <input type="text" class="form-control" id="recipient-name" name="turno" value="<?php echo $row['turno']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Aula</label>
                                    <input type="text" class="form-control" id="recipient-name" name="aula" value="<?php echo $row['aula']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Horario inicio</label>
                                    <input type="text" class="form-control" id="recipient-name" name="hora_inicio" value="<?php echo $row['hora_inicio']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Horario final</label>
                                    <input type="text" class="form-control" id="recipient-name" name="hora_final" value="<?php echo $row['hora_final']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Modalidad</label>
                                    <input type="text" class="form-control" id="recipient-name" name="modalidad" value="<?php echo $row['modalidad']; ?>">
                                </div>
                                <div class="mb-2">
                                <label for="recipient-name" class="col-form-label">Profesor <label style="color:red;">(Selecciona un profesor)</label></label>
                                    <div class="form-floating">
                                      <select class="form-select" id="floatingSelect" aria-label="Floating label select example" id="profesor" value="<?php echo $row['nomenclatura']; ?>" name="profesor" required>
                                          <option selected > Seleccione un Profesor</option>
                                          <?php
                                              include('../php/connection.php');
                                              $consul = "SELECT CONCAT(id, ' ', nomenclatura) AS profesor FROM profesores ORDER BY nomenclatura ASC";
                                              $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
                                              
                                              while($column = mysqli_fetch_array($resul)){
                                                  $optionname=$column['profesor'];
                                                  echo "<option value='$optionname'>$optionname</option>";
                                              }
                                          ?> 
                                      </select>
                                      <label for="floatingSelect">Profesor</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Grupo</label>
                                    <input type="text" class="form-control" id="recipient-name" name="grupo" value="<?php echo $row['grupo']; ?>">
                                </div>
                                <div class="mb-3">
                                  <label for="recipient-name" class="col-form-label">Reporte</label>
                                  <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" id="profesor" value="<?php echo $row['reporte']; ?>" name="reporte" required>
                                      <option selected>Seleccionar reporte</option>
                                      <option value="Retardo"<?php if($row['reporte']=="Retardo") echo 'selected="selected"';?>>Retardo</option>
                                      <option value="Falta"<?php if($row['reporte']=="Falta") echo 'selected="selected"';?>>Falta</option>
                                      <option value="Salida antes"<?php if($row['reporte']=="Salida antes") echo 'selected="selected"';?>>Salida antes</option>
                                    </select>
                                    <label for="floatingSelect">Reporte</label>
                                  </div>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="recipient-name" name="id" value="<?php echo $row['id']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Revision 1</label>
                                    <input type="time" class="form-control" id="recipient-name" name="revision_1" value="<?php echo $row['revision_1']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Revision 2</label>
                                    <input type="time" class="form-control" id="recipient-name" name="revision_2" value="<?php echo $row['revision_2']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Revision 3</label>
                                    <input type="time" class="form-control" id="recipient-name" name="revision_3" value="<?php echo $row['revision_3']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Revision 4</label>
                                    <input type="time" class="form-control" id="recipient-name" name="revision_4" value="<?php echo $row['revision_4']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Observaciones</label>
                                    <input type="text" class="form-control" id="recipient-name" name="observaciones" value="<?php echo $row['observaciones']; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal de eliminar  -->
                <form action="../php/eliminar_concentrado.php" method="post">
                <div class="modal fade" id="borrar_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            Seguro que desea eliminar el reporte para <?php echo $row['nomenclatura']; ?>?
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </div>
                    </div>
                </div>
                </div>
                </form>
                <?php
    }
    ?>
        </tbody>
    </table>

    <?php 
    }}
    ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>