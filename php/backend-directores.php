<?php
$connection = mysqli_connect("localhost", "root", "", "SUPERVSIONACAD");
$connection -> set_charset("utf8");

if(isset($_POST['restore_AdminPass'])){
    $newPassword = $_POST['resetP'];
    $newPassword1 = $_POST['resetP1'];

    if($newPassword === $newPassword1){

        $adminEmail = $_POST['email'];

        $query = "SELECT * FROM usuarios WHERE correo = '$adminEmail'";
        $result = $connection->query($query);

        if($result->num_rows > 0){
            $adminEmail = $_POST['email'];
            $newPassword = $_POST['resetP'];
            $newPassword = hash('sha512', $newPassword);

            $sql = "UPDATE usuarios SET contrasena = '$newPassword' WHERE correo = '$adminEmail'";
            if($connection->query($sql) === TRUE){
                echo '<div class="alert alert-success">¡La contraseña se ha cambiado con éxito!</div>';        

            }else{
                echo '<div class="alert alert-danger">Error al cambiar la contraseña, favor de verificar datos</div>';        
            }
        }else{
            echo '<div class="alert alert-danger">Error: Favor de verificar el correo</div>';        
        }

    }else{
        echo '<div class="alert alert-danger">Error: Las contraseñas no coinciden intenta de nuevo</div>';        
    }
}

if(isset($_POST['guardar_director'])){
    $nom_dir = $_POST['nom_dir'];
    $nombres = $_POST['nombres'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $correo = $_POST['correo'];
    $password = $_POST['contrasena'];
    $password = hash('sha512', $password);

    $query = "SELECT * FROM dir_de_carrera WHERE correo = '$correo'";
    $result = $connection->query($query);


    if($result->num_rows > 0){
        echo '<div class="alert alert-danger">Ya existe un director con la información ingresada</div>';        
    }else{
        $sql = "INSERT INTO dir_de_carrera (nom_dir, nombres, primer_apellido, segundo_apellido, correo, password) 
        VALUES ('$nom_dir', '$nombres', '$primer_apellido', '$segundo_apellido', '$correo', '$password')";
        if($connection->query($sql) === TRUE){
            echo '<div class="alert alert-success">Registro agregado correctamente!</div>';        
        }else{
            echo '<div class="alert alert-danger">Hubo un error, verifica datos ingresados</div>';
        }
    }

}
if(isset($_POST['editar_director'])){
    $nomenclatura = $_POST['nomenclatura'];
    $nombres = $_POST['nombres'];
    $id = $_POST['id'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $correo = $_POST['correo'];

    $sql = "UPDATE dir_de_carrera SET nom_dir ='$nomenclatura', nombres ='$nombres', primer_apellido ='$primer_apellido', segundo_apellido = '$segundo_apellido', 
    correo = '$correo' WHERE id ='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro editado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Hubo un error, verifica datos ingresados</div>';
    }
}
if(isset($_POST['eliminar_director'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM dir_de_carrera WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro eliminado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }
    $connection->close();
}
if(isset($_POST['change_passwordDir'])){
    $newPassword1 = $_POST['nueva_pass1'];
    $newPassword = $_POST['nueva_pass'];

    if($newPassword1 === $newPassword){

        $director = $_SESSION['usuario'];
        $newPassword = $_POST['nueva_pass'];
        $newPassword = hash('sha512', $newPassword);

        $sql = "UPDATE dir_de_carrera SET password = '$newPassword' WHERE nom_dir = '$director'";
            if($connection->query($sql) === TRUE){
                echo '<div class="alert alert-success">¡La contraseña se ha cambiado con éxito!</div>';        

            }else{
                echo '<div class="alert alert-danger">Error al cambiar la contraseña, favor de verificar datos</div>';        
            }

    }else{
        echo '<div class="alert alert-danger">Las contraseñas no coinciden</div>';        
    }
}
if(isset($_POST['restore_dirPassword'])){
    $newPassword = $_POST['rest-password'];
    $newPassword2 = $_POST['rest-password2'];

    if($newPassword === $newPassword2){

        $dirEmail = $_POST['dirEmail'];

        $query = "SELECT * FROM dir_de_carrera WHERE correo = '$dirEmail'";
        $result = $connection->query($query);

        if($result->num_rows > 0){
            $dirEmail = $_POST['dirEmail'];
            $newPassword = $_POST['rest-password'];
            $newPassword = hash('sha512', $newPassword);

            $sql = "UPDATE dir_de_carrera SET password = '$newPassword' WHERE correo = '$dirEmail'";
            if($connection->query($sql) === TRUE){
                echo '<div class="alert alert-success">¡La contraseña se ha cambiado con éxito!</div>';        

            }else{
                echo '<div class="alert alert-danger">Error al cambiar la contraseña, favor de verificar datos</div>';        
            }
        }else{
            echo '<div class="alert alert-danger">Error: Favor de verificar el correo</div>';        
        }

    }else{
        echo '<div class="alert alert-danger">Error: Las contraseñas no coinciden intenta de nuevo</div>';        
    }
}

if(isset($_POST['guardar_carrera'])){
    $nom_car = $_POST['nom_car'];
    $nombre = $_POST['nombre'];
    $c_director = $_POST['c_director'];

    $sql = ("INSERT INTO carreras (nom_car, nombre, nom_dir) 
    VALUES ('$nom_car', '$nombre', '$c_director')") or die($connection->error);

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro agregado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Favor de completar el formulario</div>';
        
    }
}
if(isset($_POST['editar_carrera'])){
    $nomenclatura = $_POST['nomenclatura'];
    $nombre = $_POST['nombre'];
    $id = $_POST['id'];
    $director = $_POST['director'];

    $sql = "UPDATE carreras SET nom_car='$nomenclatura', nombre='$nombre', nom_dir='$director'
    WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro editado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Error: Favor de completar el formulario</div>';
    }

    $connection->close();
}
if(isset($_POST['eliminar_carrera'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM carreras WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro eliminado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }
    $connection->close();
}

if(isset($_POST['guardar_profesor'])){
    $nomenclatura = $_POST['nomenclatura'];
    $nombres = $_POST['nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $correo = $_POST['correo'];
    $c_director = $_POST['c_director'];

    $query = "SELECT * FROM profesores WHERE correo = '$correo'";
    $result = $connection->query($query);

    if($result->num_rows > 0){
        echo '<div class="alert alert-danger">Este profesor ya ha sido registrado</div>';        
    }else{
        $sql = "INSERT INTO profesores (nomenclatura, nombres, primer_apellido, segundo_apellido, correo, director) 
        VALUES ('$nomenclatura', '$nombres', '$primer_apellido', '$segundo_apellido', '$correo', '$c_director')";
        if($connection->query($sql) === TRUE){
            echo '<div class="alert alert-success">Registro agregado correctamente!</div>';        
        }else{
            echo '<div class="alert alert-danger">Hubo un error, verifica datos ingresados</div>';
        }
    }

    $connection->close();
}

if(isset($_POST['editar_profesor'])){
    $nomenclatura = $_POST['nomenclatura'];
    $nombres = $_POST['nombres'];
    $primerapellido = $_POST['primerapellido'];
    $segundoapellido = $_POST['segundoapellido'];
    $id = $_POST['id'];
    $correo = $_POST['correo'];
    $director = $_POST['director'];

    $sql = "UPDATE profesores SET nomenclatura = '$nomenclatura', nombres='$nombres', primer_apellido='$primerapellido', segundo_apellido='$segundoapellido', 
    correo='$correo', director='$director' WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro editado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Favor de completar el formulario</div>';
    }

    $connection->close();
}

if(isset($_POST['borrar_profesor'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM profesores WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro eliminado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }
    $connection->close();
}


if(isset($_POST['guardar_grupo'])){
    $grupo = $_POST['grupo'];

    $query = "SELECT * FROM grupos WHERE grupo = '$grupo'";
    $result = $connection->query($query);

    if($result->num_rows > 0){
        echo '<div class="alert alert-danger">Ya existe el grupo ingresado</div>';        
    }else{
        $sql = ("INSERT INTO grupos (grupo) 
        VALUES ('$grupo')") or die($connection->error);
        if ($connection->query($sql) === TRUE) {
            echo '<div class="alert alert-success">Registro agregado correctamente!</div>';        
        } else {
            echo '<div class="alert alert-danger">Error: Favor de verificar los datos ingresados</div>';
        }
    }

    $connection->close();
}
if(isset($_POST['eliminar_grupo'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM grupos WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro eliminado correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Error: Favor de verificar</div>';
    }
    $connection->close();
}


if(isset($_POST['guardar_aula'])){
    $aula = $_POST['aula'];

    $query = "SELECT * FROM aulas WHERE aula = '$aula'";
    $result = $connection->query($query);

    if($result->num_rows > 0){
        echo '<div class="alert alert-danger">Ya existe el aula ingresada</div>';
    }else{
        $sql = ("INSERT INTO aulas (aula) 
        VALUES ('$aula')") or die($connection->error);

        if ($connection->query($sql) === TRUE) {
            echo '<div class="alert alert-success">Registro agregado correctamente!</div>';        
        } else {
            echo '<div class="alert alert-danger">Error: Favor de verificar los datos ingresados</div>';
        }    
    }
    $connection->close();
}
if(isset($_POST['eliminar_aula'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM aulas WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Registro eliminado correctamente!</div>';    
    } else {
        echo '<div class="alert alert-danger">Error: Favor de verificar</div>';
    }
    $connection->close();
}



if(isset($_POST['validar_admin'])){
    $nombre = $_POST['db_nombre'];
    $apellido = $_POST['db_apellido'];
    $correo = $_POST['db_correo'];
    $contrasena = $_POST['db_contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $query = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = $connection->query($query);

    if($result->num_rows > 0){
        echo '<div class="alert alert-danger">Ya existe un usuario con el correo ingresado</div>';        
    }else{
        $sql = "INSERT INTO usuarios (id, nombre, apellido, correo, contrasena) 
        Values ('', '$nombre', '$apellido', '$correo', '$contrasena')";
         if ($connection->query($sql) === TRUE) {
            echo '<div class="alert alert-success">¡Se registro administrador correctamente!</div>';    
        } else {
            echo '<div class="alert alert-danger">Error: Favor de verificar</div>';
        }
    }

}


if(isset($_POST['guardar_justificacion'])){
    $comentarios = $_POST['comentarios'];
    $id = $_POST['id'];

  
    $sql = "UPDATE revisiones SET justificado = 'si', comentarios ='$comentarios' WHERE id='$id'";

    if ($connection->query($sql) === TRUE) {
        echo '<div class="alert alert-success">Se justificó correctamente!</div>';        
    } else {
        echo '<div class="alert alert-danger">Error al justificar, favor de verificar</div>';
    }

    $connection->close();
}

if(isset($_POST['btn_login'])){

    include('connection.php');

    $correo = $_POST['db_correo'];
    $contrasena = $_POST['db_contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $login_validation = mysqli_query($connection, "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'");

    if(mysqli_num_rows($login_validation) > 0){
        $row = $login_validation->fetch_assoc();
        $_SESSION['usuario'] = $row['nombre'];
        header("location: ../layouts_admins/dashboard.php");
        exit;
    }else{
        echo '<div class="alert alert-danger">Correo y/o contraseña incorrectos, verifica la información</div>';
    }
}

if(isset($_POST['btn_login_director'])){
    $correo = $_POST['db_correo'];
    $contrasena = $_POST['db_contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $login_validation = mysqli_query($connection, "SELECT * FROM dir_de_carrera WHERE correo = '$correo' AND password = '$contrasena'");

    if(mysqli_num_rows($login_validation) > 0){
        $row = $login_validation->fetch_assoc();
        $_SESSION['usuario'] = $row['nom_dir'];
        header("location: ../layouts_directores/dashboard.php");
        exit;
    }else{
        echo '<div class="alert alert-danger">Correo y/o contraseña incorrectos, verifica la información</div>';
    }

}



// export a excel concentrado presencial
if(isset($_POST['export_to_excel_CGPSJ'])){
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Reportes_sin_justificar_presencial" . date('Y_m_d') . ".xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = '<table border="1">
        <thead>

            <tr>
                <th>Fecha</th>
                <th>Turno</th>
                <th>aula</th>
                <th>Hora inicial</th>
                <th>Hora final</th>
                <th>Profesor</th>
                <th>Grupo</th>
                <th>Reporte</th>
                <th>Primera Revision</th>
                <th>Segunda Revision</th>
                <th>Tercera Revision </th>
                <th>Observaciones </th>
            </tr>
        </thead>
        <tbody>';
        $query = mysqli_query($connection, "SELECT revisiones.id, revisiones.fecha, revisiones.turno, revisiones.aula, revisiones.hora_inicio, revisiones.hora_final, 
        profesores.nomenclatura, revisiones.grupo, revisiones.reporte, revisiones.revision_1, revisiones.revision_2, revisiones.revision_3, 
        revisiones.observaciones FROM revisiones
        INNER JOIN profesores ON revisiones.profesor = profesores.id WHERE modalidad = 'presencial' AND justificado = 'no' ORDER BY id DESC") or die(mysqli_error($connection));

    while ($fetch = mysqli_fetch_array($query)) {
        $output .= "<tr>
            <td>" . $fetch['fecha'] . "</td>
            <td>" . $fetch['turno'] . "</td>
            <td>" . $fetch['aula'] . "</td>
            <td>" . $fetch['hora_inicio'] . "</td>
            <td>" . $fetch['hora_final'] . "</td>
            <td>" . $fetch['nomenclatura'] . "</td>
            <td>" . $fetch['grupo'] . "</td>
            <td>" . $fetch['reporte'] . "</td>
            <td>" . $fetch['revision_1'] . "</td>
            <td>" . $fetch['revision_2'] . "</td>
            <td>" . $fetch['revision_3'] . "</td>
            <td>" . $fetch['observaciones'] . "</td>
        </tr>";
    }

    $output .= '</tbody></table>';

    echo $output;
}
if(isset($_POST['export_to_excel_CGPJ'])){
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Reportes_justificados_presencial" . date('Y_m_d') . ".xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = '<table border="1">
        <thead>

            <tr>
                <th>Fecha</th>
                <th>Turno</th>
                <th>aula</th>
                <th>Hora inicial</th>
                <th>Hora final</th>
                <th>Profesor</th>
                <th>Grupo</th>
                <th>Reporte</th>
                <th>Primera Revision</th>
                <th>Segunda Revision</th>
                <th>Tercera Revision</th>
                <th>Observaciones</th>
                <th>Justificante</th>
            </tr>
        </thead>
        <tbody>';
        $query = mysqli_query($connection, "SELECT revisiones.id, revisiones.fecha, revisiones.turno, revisiones.aula, revisiones.hora_inicio, revisiones.hora_final, 
        profesores.nomenclatura, revisiones.grupo, revisiones.reporte, revisiones.revision_1, revisiones.revision_2, revisiones.revision_3, 
        revisiones.observaciones, revisiones.comentarios FROM revisiones
        INNER JOIN profesores ON revisiones.profesor = profesores.id WHERE modalidad = 'presencial' AND justificado = 'si' ORDER BY id DESC") or die(mysqli_error($connection));

    while ($fetch = mysqli_fetch_array($query)) {
        $output .= "<tr>
            <td>" . $fetch['fecha'] . "</td>
            <td>" . $fetch['turno'] . "</td>
            <td>" . $fetch['aula'] . "</td>
            <td>" . $fetch['hora_inicio'] . "</td>
            <td>" . $fetch['hora_final'] . "</td>
            <td>" . $fetch['nomenclatura'] . "</td>
            <td>" . $fetch['grupo'] . "</td>
            <td>" . $fetch['reporte'] . "</td>
            <td>" . $fetch['revision_1'] . "</td>
            <td>" . $fetch['revision_2'] . "</td>
            <td>" . $fetch['revision_3'] . "</td>
            <td>" . $fetch['observaciones'] . "</td>
            <td>" . $fetch['comentarios'] . "</td>
        </tr>";
    }

    $output .= '</tbody></table>';

    echo $output;
}

// export a excel concentrado en linea
if(isset($_POST['export_to_excel_CGlSJ'])){
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Reportes_sin_justificar_linea" . date('Y_m_d') . ".xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = '<table border="1">
        <thead>

            <tr>
                <th>Fecha</th>
                <th>Turno</th>
                <th>Hora inicial</th>
                <th>Hora final</th>
                <th>Profesor</th>
                <th>Grupo</th>
                <th>Reporte</th>
                <th>Primera Revision</th>
                <th>Segunda Revision</th>
                <th>Tercera Revision </th>
                <th>Cuarta Revision </th>
                <th>Observaciones </th>
            </tr>
        </thead>
        <tbody>';
        $query = mysqli_query($connection, "SELECT revisiones.id, revisiones.fecha, revisiones.turno, revisiones.hora_inicio, revisiones.hora_final, 
        profesores.nomenclatura, revisiones.grupo, revisiones.reporte, revisiones.revision_1, revisiones.revision_2, revisiones.revision_3, revisiones.revision_4,
        revisiones.observaciones FROM revisiones
        INNER JOIN profesores ON revisiones.profesor = profesores.id WHERE modalidad = 'linea' AND justificado = 'no' ORDER BY id DESC") or die(mysqli_error($connection));

    while ($fetch = mysqli_fetch_array($query)) {
        $output .= "<tr>
            <td>" . $fetch['fecha'] . "</td>
            <td>" . $fetch['turno'] . "</td>
            <td>" . $fetch['hora_inicio'] . "</td>
            <td>" . $fetch['hora_final'] . "</td>
            <td>" . $fetch['nomenclatura'] . "</td>
            <td>" . $fetch['grupo'] . "</td>
            <td>" . $fetch['reporte'] . "</td>
            <td>" . $fetch['revision_1'] . "</td>
            <td>" . $fetch['revision_2'] . "</td>
            <td>" . $fetch['revision_3'] . "</td>
            <td>" . $fetch['revision_4'] . "</td>
            <td>" . $fetch['observaciones'] . "</td>
        </tr>";
    }

    $output .= '</tbody></table>';

    echo $output;
}
if(isset($_POST['export_to_excel_CGlJ'])){
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Reportes_justificados_linea_" . date('Y_m_d') . ".xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = '<table border="1">
        <thead>

            <tr>
                <th>Fecha</th>
                <th>Turno</th>
                <th>Hora inicial</th>
                <th>Hora final</th>
                <th>Profesor</th>
                <th>Grupo</th>
                <th>Reporte</th>
                <th>Primera Revision</th>
                <th>Segunda Revision</th>
                <th>Tercera Revision</th>
                <th>Cuarta Revision</th>
                <th>Observaciones</th>
                <th>Justificante</th>
            </tr>
        </thead>
        <tbody>';
        $query = mysqli_query($connection, "SELECT revisiones.id, revisiones.fecha, revisiones.turno, revisiones.hora_inicio, revisiones.hora_final, 
        profesores.nomenclatura, revisiones.grupo, revisiones.reporte, revisiones.revision_1, revisiones.revision_2, revisiones.revision_3, revisiones.revision_4,
        revisiones.observaciones, revisiones.comentarios FROM revisiones
        INNER JOIN profesores ON revisiones.profesor = profesores.id WHERE modalidad = 'linea' AND justificado = 'si' ORDER BY id DESC") or die(mysqli_error($connection));

    while ($fetch = mysqli_fetch_array($query)) {
        $output .= "<tr>
            <td>" . $fetch['fecha'] . "</td>
            <td>" . $fetch['turno'] . "</td>
            <td>" . $fetch['hora_inicio'] . "</td>
            <td>" . $fetch['hora_final'] . "</td>
            <td>" . $fetch['nomenclatura'] . "</td>
            <td>" . $fetch['grupo'] . "</td>
            <td>" . $fetch['reporte'] . "</td>
            <td>" . $fetch['revision_1'] . "</td>
            <td>" . $fetch['revision_2'] . "</td>
            <td>" . $fetch['revision_3'] . "</td>
            <td>" . $fetch['revision_4'] . "</td>
            <td>" . $fetch['observaciones'] . "</td>
            <td>" . $fetch['comentarios'] . "</td>
        </tr>";
    }

    $output .= '</tbody></table>';

    echo $output;
}
if(isset($_POST['export_universal'])){
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Reporte_universal_" . date('Y_m_d') . ".xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = '<table border="1">
        <thead>

            <tr>
                <th>Fecha</th>
                <th>Turno</th>
                <th>Aula</th>
                <th>Hora inicial</th>
                <th>Hora final</th>
                <th>Modalidad</th>
                <th>Profesor</th>
                <th>Grupo</th>
                <th>Reporte</th>
                <th>Primera Revision</th>
                <th>Segunda Revision</th>
                <th>Tercera Revision</th>
                <th>Cuarta Revision</th>
                <th>Observaciones</th>
                <th>Justificado</th>
                <th>Comentarios</th>
            </tr>
        </thead>
        <tbody>';
        $query = mysqli_query($connection, "SELECT revisiones.id, revisiones.fecha, revisiones.turno, revisiones.aula, revisiones.hora_inicio, revisiones.hora_final, revisiones.modalidad,
        profesores.nomenclatura, revisiones.grupo, revisiones.reporte, revisiones.revision_1, revisiones.revision_2, revisiones.revision_3, revisiones.revision_4,
        revisiones.observaciones, revisiones.observaciones, revisiones.justificado, revisiones.comentarios FROM revisiones
        INNER JOIN profesores ON revisiones.profesor = profesores.id ORDER BY id DESC") or die(mysqli_error($connection));

    while ($fetch = mysqli_fetch_array($query)) {
        $output .= "<tr>
            <td>" . $fetch['fecha'] . "</td>
            <td>" . $fetch['turno'] . "</td>
            <td>" . $fetch['aula'] . "</td>
            <td>" . $fetch['hora_inicio'] . "</td>
            <td>" . $fetch['hora_final'] . "</td>
            <td>" . $fetch['modalidad'] . "</td>
            <td>" . $fetch['nomenclatura'] . "</td>
            <td>" . $fetch['grupo'] . "</td>
            <td>" . $fetch['reporte'] . "</td>
            <td>" . $fetch['revision_1'] . "</td>
            <td>" . $fetch['revision_2'] . "</td>
            <td>" . $fetch['revision_3'] . "</td>
            <td>" . $fetch['revision_4'] . "</td>
            <td>" . $fetch['observaciones'] . "</td>
            <td>" . $fetch['justificado'] . "</td>
            <td>" . $fetch['comentarios'] . "</td>
        </tr>";
    }

    $output .= '</tbody></table>';

    echo $output;
}

?>