<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/LogoUTCJ.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/sytle1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Reporte de revisiones</title>
</head>
<body class="captura_background">
<!-- navbar -->
<?php include ("navbar.php");?>

<?php
include("../php/capturas_en_linea.php");
?>
<h1 class="h1-tittles text-muted">Reporte De Revisiones En Linea</h1>
<div class="div-captura">
    <div class="sub-div-captura">
        <form action="" method="POST">
        <div class="div_captura1">
            <div class="div_fecha">
                <p class="lead">Fecha</p>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
            <br>
            <div class="div_turno">
                <p class="lead">Turno</p>
                <input type="radio" class="btn-check" name="turno" id="option5" autocomplete="off" value="T.M" required>
                <label class="btn btn-outline-secondary" for="option5">Turno matutino</label>
                <input type="radio" class="btn-check" name="turno" id="option6" autocomplete="off" value="T.V" required>
                <label class="btn btn-outline-secondary" for="option6">Turno vespertino</label>  
            </div>
            <br>
            <div class="div_horario">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" id="hora_inicio" name="hora_inicio" required>
                        <option selected>Seleccionar hora inicial</option>
                        <option value="07:00 a.m.">07:00 a.m.</option>
                        <option value="08:00 a.m.">08:00 a.m.</option>
                        <option value="09:00 a.m.">09:00 a.m.</option>
                        <option value="10:00 a.m.">10:00 a.m.</option>
                        <option value="11:00 a.m.">11:00 a.m.</option>
                        <option value="12:00 p.m.">12:00 p.m.</option>
                        <option value="01:00 p.m.">01:00 p.m.</option>
                        <option value="02:00 p.m.">02:00 p.m.</option>
                        <option value="03:00 p.m.">03:00 p.m.</option>
                        <option value="04:00 p.m.">04:00 p.m.</option>
                        <option value="05:00 p.m.">05:00 p.m.</option>
                        <option value="06:00 p.m.">06:00 p.m.</option>
                        <option value="07:00 p.m.">07:00 p.m.</option>
                        <option value="08:00 p.m.">08:00 p.m.</option>
                        <option value="09:00 p.m.">09:00 p.m.</option>
                        <option value="10:00 p.m.">10:00 p.m.</option>
                    </select>
                    <label for="floatingSelect">Horario inicial</label>
                </div>
                <br>
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example"   id="hora_final" name="hora_final" required>
                        <option selected>Seleccionar hora final</option>
                        <option value="07:00 a.m.">07:00 a.m.</option>
                        <option value="08:00 a.m.">08:00 a.m.</option>
                        <option value="09:00 a.m.">09:00 a.m.</option>
                        <option value="10:00 a.m.">10:00 a.m.</option>
                        <option value="11:00 a.m.">11:00 a.m.</option>
                        <option value="12:00 p.m.">12:00 p.m.</option>
                        <option value="01:00 p.m.">01:00 p.m.</option>
                        <option value="02:00 p.m.">02:00 p.m.</option>
                        <option value="03:00 p.m.">03:00 p.m.</option>
                        <option value="04:00 p.m.">04:00 p.m.</option>
                        <option value="05:00 p.m.">05:00 p.m.</option>
                        <option value="06:00 p.m.">06:00 p.m.</option>
                        <option value="07:00 p.m.">07:00 p.m.</option>
                        <option value="08:00 p.m.">08:00 p.m.</option>
                        <option value="09:00 p.m.">09:00 p.m.</option>
                        <option value="10:00 p.m.">10:00 p.m.</option>
                    </select>
                    <label for="floatingSelect">Horario final</label>
                </div>
            </div>
            <div class="div_profesor">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" id="profesor" name="profesor" required>
                        <option selected>Seleccionar profesor</option>
                        <?php
                            include('../php/connection.php');
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
                <br>
                <div class="div_grupo">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Grupo" name="grupo" required>
                    <label for="floatingInput">Grupo</label>
                </div>
            </div>
            </div>
        </div>
        <div class="div_revisiones">
                <p class="lead">Primera revisión</p> 
                <div class="cs-form">
                    <input type="time" name="primerarevision" class="form-control" required/>
                </div>
                <br>
                <p class="lead">Segunda revisión</p> 
                <div class="cs-form">
                    <input type="time" name="segundarevision" class="form-control" required/>
                </div>
                <br>
                <p class="lead">Tercera revisión</p>
                <div class="cs-form">
                    <input type="time" name="tercerarevision" class="form-control" required/>
                </div>
                <br>
                <p class="lead">Cuarta revisión</p>
                <div class="cs-form">
                    <input type="time" name="cuartarevision" class="form-control" required/>
                </div>
                <br>
                <div class="div_incidencia">
            <p class="lead">Reporte</p>
                <input type="radio" class="btn-check" name="reporte" id="option7" autocomplete="off" value="No conectado" required>
                <label class="btn btn-outline-secondary" for="option7">No conectado</label>
                <input type="radio" class="btn-check" name="reporte" id="option8" autocomplete="off" value="Dejo Actividad" required>
                <label class="btn btn-outline-secondary" for="option8">Dejo Actividad </label>
                <input type="radio" class="btn-check" name="reporte" id="option9" autocomplete="off" value="Entro y Salio" required>
                <label class="btn btn-outline-secondary" for="option9">Entro y Salio</label>
                <input type="radio" class="btn-check" name="reporte" id="option10" autocomplete="off" value="Sin Alumnos" required>
                <label class="btn btn-outline-secondary" for="option10">Sin Alumnos</label>
                <input type="radio" class="btn-check" name="reporte" id="option11" autocomplete="off" value="Otro" required>
                <label class="btn btn-outline-secondary" for="option11">Otro</label>
            </div>
            <br>
            
            <div class="div_obs">
                <div class="form-floating">
                    <textarea class="form-control" name="observaciones" placeholder="Observaciones" id="floatingTextarea2" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Observaciones</label>
                </div>
            </div>
        </div>
        <div class="div_buttons">
            <input class="btn_enviar btn btn-primary" type="submit" value="Enviar">
            <input class="btn_captura btn btn-secondary" type="reset" value="Limpiar">
            </div>
        
        </form>
    </div>
 </div>    

    


<!-- <script>
    let Checked = null;
    //The class name can vary
        for (let CheckBox of document.getElementsByClassName('only-one')){
            CheckBox.onclick = function(){
            if(Checked!=null){
            Checked.checked = false;
            Checked = CheckBox;
            }
            Checked = CheckBox;
        }
    }
    let Checked_turno = null;
    //The class name can vary
        for (let CheckBox of document.getElementsByClassName('turno')){
            CheckBox.onclick = function(){
            if(Checked_turno!=null){
            Checked_turno.checked = false;
            Checked_turno = CheckBox;
            }
            Checked_turno = CheckBox;
        }
    }
</script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>