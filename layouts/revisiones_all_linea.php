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
<body class="captura_background">
    <!-- navbar -->
<?php include ("navbar.php");?>
<?php include('../php/editar_concentrado_linea.php');?>
<h1 class="h1-tittles text-muted">Concentrado general en línea </h1>
<div class="div-table">
<!-- tabla -->
<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Turno</th>
      <th scope="col">Horario</th>
      <th scope="col">Profesor</th>
      <th scope="col">Grupo</th>
      <th scope="col">Reporte</th>
      <th scope="col">Revisión 1</th>
      <th scope="col">Revisión 2</th>
      <th scope="col">Revisión 3</th>
      <th scope="col">Revisión 4</th>
      <th scope="col">Observaciones</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include('../php/connection.php');
    $consul = "SELECT revisiones.id, revisiones.fecha, revisiones.turno, CONCAT(revisiones.hora_inicio,' - ',revisiones.hora_final) AS horario, 
    profesores.nomenclatura, revisiones.grupo, revisiones.reporte, revisiones.revision_1, revisiones.revision_2, revisiones.revision_3, revisiones.revision_4, 
    revisiones.observaciones FROM revisiones
    INNER JOIN profesores ON revisiones.profesor = profesores.id WHERE modalidad = 'linea' ORDER BY id DESC";
    $result = mysqli_query($connection, $consul) or die ("Algo salio mal");
    
    if(mysqli_num_rows($result) > 0){
        foreach($result as $row){
          ?>
            <tr>
              <td><?php echo $row["fecha"]; ?></td>
              <td><?php echo $row["turno"];?></td>
              <td><?php echo $row["horario"];?></td>
              <td><?php echo $row["nomenclatura"];?></td>
              <td><?php echo $row["grupo"]; ?></td>
              <td><?php echo $row["reporte"]; ?></td>
              <td><?php echo $row["revision_1"]; ?></td>
              <td><?php echo $row["revision_2"]; ?></td>
              <td><?php echo $row["revision_3"]; ?></td>
              <td><?php echo $row["revision_4"]; ?></td>
              <td><?php echo $row["observaciones"]; ?></td>
              <td>
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>">Editar</button>
              </td>
            </tr>
                <!-- Modal editar -->
                <div class="modal fade" id="exampleModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body modal-background">
                            <form action="" method="post">
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label">Profesor</label>
                                    <div class="form-floating">
                                      <select class="form-select" id="floatingSelect" aria-label="Floating label select example" id="profesor" value="<?php echo $row['nomenclatura']; ?>" name="profesor" required>
                                          <option selected>Seleccionar profesor</option>
                                          <?php
                                              include('../php/connection.php');
                                              $selected = "";
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
                                  <label for="recipient-name" class="col-form-label">Reporte</label>
                                  <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" id="profesor" value="<?php echo $row['reporte']; ?>" name="reporte" required>
                                      <option selected>Seleccionar reporte</option>
                                      <option value="No conectado"<?php if($row['reporte']=="No conectado") echo 'selected="selected"';?>>No conectado</option>
                                      <option value="Dejo Actividad"<?php if($row['reporte']=="Dejo Actividad") echo 'selected="selected"';?>>Dejo Actividad</option>
                                      <option value="Entro y Salio"<?php if($row['reporte']=="Entro y Salio") echo 'selected="selected"';?>>Entro y Salio</option>
                                      <option value="Sin Alumnos"<?php if($row['reporte']=="Sin Alumnos") echo 'selected="selected"';?>>Sin Alumnos</option>
                                      <option value="Otro"<?php if($row['reporte']=="Otro") echo 'selected="selected"';?>>Otro</option>
                                    </select>
                                    <label for="floatingSelect">Reporte</label>
                                  </div>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="recipient-name" name="id" value="<?php echo $row['id']; ?>">
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
                <?php
    }
    ?>
        </tbody>
    </table>
    </div>

    <?php 
    }
    ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>