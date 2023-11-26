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
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Profesores</title>
</head>
<body class="admin_background">
    <?php include('navbar.php'); ?>
    <?php include('../php/backend-directores.php');?>
    <?php include('../php/connection.php');
        $consul = "SELECT COUNT(*) AS total_profes FROM profesores";
        $resul = mysqli_query($connection, $consul);
        $row = mysqli_fetch_array($resul);?>
    <h1 class="h1-tittles text-muted display-6">Profesores <span class="badge bg-light text-dark"><?php echo $row['total_profes'];?></span></h1>
    <div class="div-table">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-addprofe" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar profesor
    </button>
    <!-- buscar profesor -->
    <form class="form-inline form-buscarprofe" method="post">
        <input name="buscar-profe" class="form-control mr-sm-2 input-busquedaprofe" type="search" placeholder="Buscar" aria-label="Search">
        <button name="buscar-profesor" class="btn btn-success" type="submit">Buscar</button>
    </form>
    <br><br>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">  
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo profesor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body modal-background">
            <form action="" method="POST">
                <label for="recipient-name" class="col-form-label">Nomenclatura</label>
                <input class="form-control" type="text" name="nomenclatura" placeholder="Ingrese nomenclatura" required>
                <br>
                <label for="recipient-name" class="col-form-label">Nombre de profesor</label>
                <input class="form-control" type="text" name="nombre" placeholder="Ingrese nombre" required>
                <br>
                <label for="recipient-name" class="col-form-label">Primer apellido</label>
                <input class="form-control" type="text" name="primer_apellido" placeholder="Ingrese primer apellido" required>
                <br>
                <label for="recipient-name" class="col-form-label">Segundo apellido</label>
                <input class="form-control" type="text" name="segundo_apellido" placeholder="Ingrese segundo apellido" required>
                <br>
                <label for="recipient-name" class="col-form-label">Correo</label>
                <input class="form-control" type="text" name="correo" placeholder="Ingrese correo" required>
                <br>
                <label for="recipient-name" class="col-form-label">Director</label>
                <!-- <label for="Director">Director</label> -->
                <select class="form-select" id="docente" name="c_director" required>
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
            <button type="submit" class="btn btn-primary" name="guardar_profesor">Guardar cambios</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <?php
    include ('../php/connection.php');
    if(isset($_POST['buscar-profesor'])){
        ?>
        <a class="btn-delete-filter" href="profesores.php"><button type="submit" class="btn btn-danger btn-delete-filter">Borrar busqueda</button></a>
        <br><br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nomenclatura</th> 
                <th scope="col">Nombres</th>
                <th scope="col">Primer apellido</th>
                <th scope="col">Segundo apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Director</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $resultado = $_POST['buscar-profe'];

        $query = "SELECT profesores.id, profesores.nomenclatura, profesores.nombres, profesores.primer_apellido, profesores.segundo_apellido, profesores.correo, dir_de_carrera.nom_dir
        FROM profesores
        INNER JOIN dir_de_carrera ON profesores.director = dir_de_carrera.id WHERE profesores.nomenclatura LIKE '%$resultado%' 
        OR profesores.nombres LIKE '%$resultado%' OR profesores.primer_apellido LIKE '%$resultado%' OR profesores.segundo_apellido 
        LIKE '%$resultado%' OR profesores.correo LIKE '%$resultado%' OR dir_de_carrera.nom_dir LIKE '%$resultado%' ORDER BY nomenclatura";
        $query_run = mysqli_query($connection,$query);

        if(mysqli_num_rows($query_run) > 0){
            foreach($query_run as $row){
                ?>
                <tr>
                    <td><?php echo $row["nomenclatura"]; ?></td>
                    <td><?php echo $row["nombres"];?></td>
                    <td><?php echo $row["primer_apellido"]; ?></td>
                    <td><?php echo $row["segundo_apellido"];?></td>
                    <td><?php echo $row["correo"];?></td>
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
                            <form action="" method="POST">
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label">Nomenclatura</label>
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
                                <!-- <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Director</label>
                                    <input type="text" class="form-control" id="recipient-name" name="director" value="<?php echo $row['director']; ?>">
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" name="editar_profesor">Guardar Cambios</button>
                            </div>
                            </form>
                        </div>
                    </div>
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
                            Seguro que desea eliminar a <?php echo $row['nombres']; ?>?
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="borrar_profesor">Eliminar</button>
                    </div>
                    </div>
                </div>
                </div>
                </form>
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
        <p class="lead">Resultados para <strong><?php echo $resultado?></strong></p>
        <?php
    }else{
    ?>
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

            $result = mysqli_query($connection, "SELECT profesores.id, profesores.nomenclatura, profesores.nombres, profesores.primer_apellido, profesores.segundo_apellido, profesores.correo, dir_de_carrera.nom_dir
            FROM profesores
            INNER JOIN dir_de_carrera ON profesores.director = dir_de_carrera.id ORDER BY nomenclatura");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row["nomenclatura"]; ?></td>
                    <td><?php echo $row["nombres"];?></td>
                    <td><?php echo $row["primer_apellido"]; ?></td>
                    <td><?php echo $row["segundo_apellido"];?></td>
                    <td><?php echo $row["correo"];?></td>
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
                            <form action="" method="POST">
                                <div class="mb-2">
                                    <label for="recipient-name" class="col-form-label">Nomenclatura</label>
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
                                <!-- <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Director</label>
                                    <input type="text" class="form-control" id="recipient-name" name="director" value="<?php echo $row['director']; ?>">
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" name="editar_profesor">Guardar Cambios</button>
                            </div>
                            </form>
                        </div>
                    </div>
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
                            Seguro que desea eliminar a <?php echo $row['nombres']; ?>?
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="borrar_profesor">Eliminar</button>
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
    </div>

    <?php 
    }
    ?>
</body>
</html>