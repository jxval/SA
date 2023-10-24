<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Carreras</title>
</head>
<body>
<!-- navbar -->
<?php include ("navbar.php");?>
<h1 class="h1-tittles text-muted">Carreras</h1>
<div class="div-table">
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Agregar carrera
  </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">  
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agrega una carrera</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <?php require_once '../php/backend-directores.php';?>
          <form action="../php/backend-directores.php" method="POST">
              <input type="text" name="nom_car" placeholder="Ingrese nomenclatura">
              <input type="text" name="nombre" placeholder="Ingrese nombre">
              <!-- <label for="Director">Director</label> -->
              <select id="docente" name="c_director">
                <option value="">Seleccionar director</option>
                  <?php
                  include('../php/connection.php');
                  $consul = "SELECT nom_dir FROM dir_de_carrera";
                  $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
                  
                  while($column = mysqli_fetch_array($resul)){
                      $optionname=$column['nom_dir'];
                      echo "<option value='$optionname'>$optionname</option>";
                  }
                  ?>
              </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" name="guardar_carrera">Guardar cambios</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <br><br>

<!-- barre de busqueda  -->
<!-- <form action="" method="GET">
    <div class="input-group mb-3">
        <input type="text" name="buscar" required value="" class="form-control" placeholder="Buscar información">
        <button type="submit" class="btn btn-primary" name="search">Search</button>
    </div>
</form> -->

<!-- tabla -->

  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">Nomenclatura</th>
        <th scope="col">Nombre</th>
        <th scope="col">Director</th>
        <th colspan="2">Acción</th>
      </tr>
    </thead>
    <?php 
      include('../php/connection.php');
      $consul = "SELECT * FROM carreras";
      $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
      while($column = mysqli_fetch_array($resul)){
      echo "<tbody>";
          echo "<tr>";
          echo "<td>".$column['nom_car']."</td>";
          echo "<td>".$column['nombre']."</td>";
          echo "<td>".$column['nom_dir']."</td>";
          ?>
          <td>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_">Editar</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrar_"> Eliminar</button>
          </td>
          <?php
          echo "</tr>";
      echo "</tbody>";
      }
      ?>
      </tbody>
      </table>
    </div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>