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
    <title>Grupos</title>
</head>
<body class="admin_background">
<!-- navbar -->
<?php include ("navbar.php");?>
<?php include('../php/backend-directores.php');?>
<?php include('../php/connection.php');
  $consul = "SELECT COUNT(*) AS total_grupos FROM grupos";
  $resul = mysqli_query($connection, $consul);
  $row = mysqli_fetch_array($resul);?>
<h1 class="h1-tittles text-muted display-6">Grupos <span class="badge bg-light text-dark"><?php echo $row['total_grupos'];?></span></h1>
<div class="div-table">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar grupo
</button>
<br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo grupo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-background">
        <form action="" method="POST">
          <label for="recipient-name" class="col-form-label">Grupo</label>
          <input class="form-control" type="text" name="grupo" placeholder="Ingrese el Grupo" required>
          <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name="guardar_grupo">Guardar cambios</button>
      </div>
      </form>
    </div>
  </div>
</div>

  <!-- tabla -->

  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">Grupos</th>
        <th scope="col" style="width:10rem;">Accion</th>
      </tr>
    </thead>
    <tbody>
      <?php require_once("../php/connection.php");
        $result = mysqli_query($connection, "SELECT * FROM grupos");
        while ($row = mysqli_fetch_assoc($result)):
      ?>
      <tr>
        <td><?php echo $row["grupo"];?></td>
        <td>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#borrar_<?php echo $row['id'];?>"> Eliminar</button>
        </td>
      </tr>
      
      </div>
    <!-- Modal de eliminar  -->
    <form action="" method="post">
                <div class="modal fade" id="borrar_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            Seguro que desea eliminar <?php echo $row['grupo']; ?>?
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="eliminar_grupo">Eliminar</button>
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