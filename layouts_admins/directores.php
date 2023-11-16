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
    <title>Directores test</title>
</head>
<body class="admin_background">
<!-- navbar -->
<?php include ("navbar.php");?>
<?php include('../php/backend-directores.php');?>
<?php include('../php/connection.php');
  $consul = "SELECT COUNT(*) AS total_directores FROM dir_de_carrera";
  $resul = mysqli_query($connection, $consul);
  $row = mysqli_fetch_array($resul);?>
<h1 class="h1-tittles text-muted display-6">Directores <span class="badge bg-light text-dark"><?php echo $row['total_directores'];?></span></h1>
<div class="div-table">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar director
</button>
<br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo director</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-background">
        <form action="" method="POST">
          <label for="recipient-name" class="col-form-label">Nomenclatura</label>
          <input class="form-control" type="text" name="nom_dir" placeholder="Ingrese nomenclatura" required>
          <br>
          <label for="recipient-name" class="col-form-label">Nombres</label>
          <input class="form-control" type="text" name="nombres" placeholder="Ingrese nombre(s)" required>
          <br>
          <label for="recipient-name" class="col-form-label">Primer apellido</label>
          <input class="form-control" type="text" name="primer_apellido" placeholder="Ingrese primer apellido" required>
          <br>
          <label for="recipient-name" class="col-form-label">Segundo apellido</label>
          <input class="form-control" type="text" name="segundo_apellido" placeholder="Ingrese segundo apellido" required>
            <!-- <button type="submit" name="guardar">Agregar</button> -->
            <br>
          <label for="recipient-name" class="col-form-label">Correo</label>
          <input class="form-control" type="mail" name="correo" placeholder="Ingrese correo" required>
          <br>
          <label for="recipient-name" class="col-form-label">Contraseña</label>
          <input class="form-control" type="password" name="contrasena" placeholder="Ingrese contraseña" requires>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="guardar">Guardar cambios</button>
      </div>
      </form>
    </div>
  </div>
</div>

  <!-- tabla -->

  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">Nomenclatura</th>
        <th scope="col">Nombres</th>
        <th scope="col">Primer apellido</th>
        <th scope="col">Segundo apellido</th>
        <th colspan="2">Acción</th>
      </tr>
    </thead>
    <tbody>
      <?php require_once("../php/connection.php");
        $result = mysqli_query($connection, "SELECT * FROM dir_de_carrera");
        while ($row = mysqli_fetch_assoc($result)):
      ?>
      <tr>
        <td><?php echo $row["nom_dir"];?></td>
        <td><?php echo $row["nombres"];?></td>
        <td><?php echo $row["primer_apellido"];?></td>
        <td><?php echo $row["segundo_apellido"];?></td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id'];?>">Editar</button>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrar_<?php echo $row['id'];?>"> Eliminar</button>
        </td>
      </tr>
        <!-- modal editar -->
      <div class="modal fade" id="exampleModal_<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-background">
              <form action="../php/editardirector.php" method="post">
                <div class="mb-2">
                  <label for="recipient-name" class="col-form-label">Nomenclatura</label>
                  <input type="text" class="form-control" id="recipient-name" name="nomenclatura" value="<?php echo $row['nom_dir'];?>">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nombres</label>
                  <input type="text" class="form-control" id="recipient-name" name="nombres" value="<?php echo $row['nombres'];?>">
                </div>
                <div class="mb-3">
                  <input type="hidden" class="form-control" id="recipient-name" name="id" value="<?php echo $row['id']; ?>">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Primer apellido</label>
                  <input type="text" class="form-control" id="recipient-name" name="primer_apellido" value="<?php echo $row['primer_apellido'];?>">
                </div>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Segundo apellido</label>
                  <input type="text" class="form-control" id="recipient-name" name="segundo_apellido" value="<?php echo $row['segundo_apellido'];?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- modal editar -->
      <form action="../php/eliminardirector.php" method="post">
        <div class="modal fade" id="borrar_<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <strong>Se eliminarán todos los registros relacionados con este director.
                  Se recomienda primero modificar el director de cada profesor antes de proceder.
                </strong>
                <br>
                Seguro que desea eliminar a <?php echo $row['nombres'];?>? 
                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <?php endwhile;?>
    </tbody>
  </table>
  </div>
        










<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>