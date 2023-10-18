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
<body>
    <br><br>
   
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Clave</th> 
                <th scope="col">Nombres</th>
                <th scope="col">Primer_apellido</th>
                <th scope="col">Segundo_apellido</th>
                <th scope="col">Id</th>
                <th scope="col">Correo</th>
                <th scope="col">Director</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once("../php/connection.php");
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "supervsionacad";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }
            // Consulta SQL para obtener los datos de la tabla (cambia 'tu_tabla' al nombre de tu tabla)

            $result = mysqli_query($conn, "SELECT * FROM maestrE");
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <tr>
                    <td><?php echo $row["clave"]; ?></td>
                    <td><?php echo $row["nombres"];?></td>
                    <td><?php echo $row["primer_apellido"]; ?></td>
                    <td><?php echo $row["segundo_apellido"];?></td>
                    <td><?php echo $row["id"]; ?></td>
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
                                    <label for="recipient-name" class="col-form-label">Clave</label>
                                    <input type="text" class="form-control" id="recipient-name" name="clave" value="<?php echo $row['clave']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nombres</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nombres" value="<?php echo $row['nombres']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for "recipient-name" class="col-form-label">Primer Apellido</label>
                                    <input type="text" class="form-control" id="recipient-name" name="primerapellido" value="<?php echo $row['primer_apellido']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="recipient-name" name="segundoapellido" value="<?php echo $row['segundo_apellido']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">ID</label>
                                    <input type="text" class="form-control" id="recipient-name" name="id" value="<?php echo $row['id']; ?>">
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
</body>
</html>