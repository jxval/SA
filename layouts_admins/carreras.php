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
    <title>Carreras</title>
</head>
<body class="admin_background">
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
          <h5 class="modal-title" id="exampleModalLabel">Nueva carrera</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-background">
        <?php require_once '../php/backend-directores.php';?>
            <form action="../php/backend-directores.php" method="POST">
                <label for="recipient-name" class="col-form-label">Nomenclatura</label>
                <input class="form-control" type="text" name="nom_car" placeholder="Ingrese nomenclatura">
                <br>
                <label for="recipient-name" class="col-form-label">Nombre de carrera</label>
                <input class="form-control" type="text" name="nombre" placeholder="Ingrese nombre">
                <br>
                <label for="recipient-name" class="col-form-label">Director</label>
                <!-- <label for="Director">Director</label> -->
                <select class="form-select" id="docente" name="c_director">
                    <option value="">Seleccionar director</option>
                    <?php
                    include('../php/connection.php');
                    $consul = "SELECT CONCAT(id, ' ', nom_dir) AS director FROM dir_de_carrera";
                    $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
                  
                    while($column = mysqli_fetch_array($resul)){
                        $optionname=$column['director'];
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


  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nomenclatura</th> 
                <th scope="col">Nombre</th>
                <th scope="col">Director</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("../php/connection.php");
            
            // Consulta SQL para obtener los datos de la tabla (cambia 'tu_tabla' al nombre de tu tabla)

            $result = mysqli_query($connection, "SELECT carreras.id, carreras.nom_car, carreras.nombre, dir_de_carrera.nom_dir
            FROM carreras
            INNER JOIN dir_de_carrera ON carreras.nom_dir = dir_de_carrera.id;");
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <tr>
                    <td><?php echo $row["nom_car"]; ?></td>
                    <td><?php echo $row["nombre"];?></td>
                    <td><?php echo $row["nom_dir"]; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['id']; ?>">Editar</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrar_<?php echo $row['id']; ?>"> Eliminar</button>
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
                            <form action="../php/editarcarrera.php" method="POST">
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label">Nomenclatura</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nomenclatura" value="<?php echo $row['nom_car']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nombre</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nombre" value="<?php echo $row['nombre']; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="recipient-name" name="id" value="<?php echo $row['id']; ?>">
                                </div>
                                <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Director</label>
                                <select class="form-select" id="docente" name="director">
                                    <option value="">Seleccionar director</option>
                                        <?php
                                        include('../php/connection.php');
                                        $consul = "SELECT CONCAT(id, ' ', nom_dir) AS director FROM dir_de_carrera";
                                        $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
                                    
                                        while($column = mysqli_fetch_array($resul)){
                                            $optionname=$column['director'];
                                            echo "<option value='$optionname'>$optionname</option>";
                                        }
                                        ?>
                                </select>
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
                <form action="../php/eliminarcarrera.php" method="post">
                <div class="modal fade" id="borrar_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            Seguro que desea eliminar <?php echo $row['nombre']; ?>?
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
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>