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
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Profesores</title>
</head>
<body class="admin_background">
    <?php include('navbar.php'); ?>
    <h1 class="h1-tittles text-muted">Profesores</h1>
    <div class="div-table">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar profesor
    </button>
    <br><br>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">  
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar profesor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <?php require_once '../php/backend-directores.php';?>
            <form action="../php/backend-directores.php" method="POST">
                <input type="text" name="nomenclatura" placeholder="Ingrese nomenclatura">
                <input type="text" name="nombre" placeholder="Ingrese nombre">
                <input type="text" name="primer_apellido" placeholder="Ingrese primer apellido">
                <input type="text" name="segundo_apellido" placeholder="Ingrese segundo apellido">
                <input type="text" name="correo" placeholder="Ingrese correo">
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
            <button type="submit" class="btn btn-primary" name="guardar_profesor">Guardar cambios</button>
        </div>
        </form>
        </div>
    </div>
    </div>



    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nomenclatura</th> 
                <th scope="col">Nombres</th>
                <th scope="col">Primer_apellido</th>
                <th scope="col">Segundo_apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Director</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("../php/connection.php");
            
            // Consulta SQL para obtener los datos de la tabla (cambia 'tu_tabla' al nombre de tu tabla)

            $result = mysqli_query($connection, "SELECT * FROM profesores");
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <tr>
                    <td><?php echo $row["nomenclatura"]; ?></td>
                    <td><?php echo $row["nombres"];?></td>
                    <td><?php echo $row["primer_apellido"]; ?></td>
                    <td><?php echo $row["segundo_apellido"];?></td>
                    <td><?php echo $row["correo"];?></td>
                    <td><?php echo $row["director"]; ?></td>
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
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                            <form action="../php/editarprofesor.php" method="POST">
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label">nomenclatura</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nomenclatura" value="<?php echo $row['nomenclatura']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nombres</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nombres" value="<?php echo $row['nombres']; ?>">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="recipient-name" name="id" value="<?php echo $row['id']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Primer Apellido</label>
                                    <input type="text" class="form-control" id="recipient-name" name="primerapellido" value="<?php echo $row['primer_apellido']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="recipient-name" name="segundoapellido" value="<?php echo $row['segundo_apellido']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Correo</label>
                                    <input type="text" class="form-control" id="recipient-name" name="correo" value="<?php echo $row['correo']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Director</label>
                                    <input type="text" class="form-control" id="recipient-name" name="director" value="<?php echo $row['director']; ?>">
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
                <form action="../php/eliminar.php" method="post">
                <div class="modal fade" id="borrar_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Borrar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Seguro que quiere eliminar <?php echo $row['nombres']; ?>
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
</body>
</html>