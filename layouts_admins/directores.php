<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Directores test</title>
</head>
<body>
<!-- navbar -->
<?php include ("navbar.php");?>
<h1 class="h1-tittles text-muted">Directores</h1>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar director
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php require_once '../php/backend-directores.php';?>
        <form action="../php/backend-directores.php" method="POST">
            <input type="text" name="nom_dir" placeholder="Ingrese nomenclatura">
            <input type="text" name="nombres" placeholder="Ingrese nombre(s)">
            <input type="text" name="primer_apellido" placeholder="Ingrese primer apellido">
            <input type="text" name="segundo_apellido" placeholder="Ingrese segundo apellido">
            <!-- <button type="submit" name="guardar">Agregar</button> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="guardar">Save changes</button>
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
    <?php 
        include('../php/connection.php');
        $consul = "SELECT * FROM dir_de_carrera";
        $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
        while($column = mysqli_fetch_array($resul)){
        echo "<tbody>";
            echo "<tr>";
            echo "<td>".$column['nom_dir']."</td>";
            echo "<td>".$column['nombres']."</td>";
            echo "<td>".$column['primer_apellido']."</td>";
            echo "<td>".$column['segundo_apellido']."</td>";
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
    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>