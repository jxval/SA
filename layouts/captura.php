<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Captura de revisiones</title>
</head>
<body>
<!-- navbar -->
<?php include ("navbar.php");?>
<h1>Captura de revisiones</h1>
<?php
include("../php/capturas.php");
?>
    <form action="" method="POST">

    
    Fecha
    <input type="date" name="fecha" id="fecha">
    <br><br>
    <label for="">Turno</label>
    <br><br>
    <input type="checkbox" name="turno" id="TM" value="T.M" class="turno">T.M
    <br><br>
    <input type="checkbox" name="turno" id="TV" value="T.V" class="turno">T.V
    <br><br>
    Aula
    <input type="text" name="aula" id="aula">
    <br><br>
    Horario Inicial
    <select id="hora_inicio" name="hora_inicio">
    <option value=""></option>
    <option value="7:00">7:00</option>
    <option value="8:00">8:00</option>
    <option value="9:00">9:00</option>
    <option value="10:00">10:00</option>
    <option value="11:00">11:00</option>
    <option value="12:00">12:00</option>
    <option value="13:00">13:00</option>
    <option value="14:00">14:00</option>
    <option value="15:00">15:00</option>
    <option value="16:00">16:00</option>
    <option value="17:00">17:00</option>
    <option value="18:00">18:00</option>
    <option value="19:00">19:00</option>
    <option value="20:00">20:00</option>
    <option value="21:00">21:00</option>
    <option value="22:00">22:00</option>
</select>
<br><br>
Horario Final
<select id="hora_final" name="hora_final">
    <option value=""></option>
    <option value="7:00">7:00</option>
    <option value="8:00">8:00</option>
    <option value="9:00">9:00</option>
    <option value="10:00">10:00</option>
    <option value="11:00">11:00</option>
    <option value="12:00">12:00</option>
    <option value="13:00">13:00</option>
    <option value="14:00">14:00</option>
    <option value="15:00">15:00</option>
    <option value="16:00">16:00</option>
    <option value="17:00">17:00</option>
    <option value="18:00">18:00</option>
    <option value="19:00">19:00</option>
    <option value="20:00">20:00</option>
    <option value="21:00">21:00</option>
    <option value="22:00">22:00</option>
</select>
<br><br>


Docente
<!-- <select name="profesor" id="">
    <option value="RODRIGUEZ ME">RODRIGUEZ ME</option>
</select> -->
<select id="docente" name="profesor">
    <option value="">Seleccionar</option>
    <?php
    include('../php/connection.php');
    $consul = "SELECT nomenclatura FROM profesores";
    $resul = mysqli_query($connection, $consul) or die ("Algo salio mal");
    
    while($column = mysqli_fetch_array($resul)){
        $optionname=$column['nomenclatura'];
        echo "<option value='$optionname'>$optionname</option>";
    }
    ?> 
</select>
<br><br>
    Grupo
    <input type="text" name="grupo" id="grupo"> 
    <br><br>
    <input type="checkbox" name="reporte" class="only-one" value="Retardo"> Retardo
    <br><br>
    <input type="checkbox" name="reporte" class="only-one" value="Falta"> Falta
    <br><br>
    <input type="checkbox" name="reporte" class="only-one" value="Salida Antes"> Salida Antes

    <br><br>
    Primera Revision 
    <input type="text" name="primerarevision" id="primerarevision">
    <br><br>
    Segunda Revision
    <input type="text" name="segundarevision" id="segundarevision">
    <br><br>
    Tercera Revison
    <input type="text" name="tercerarevision" id="tercerarevision">
    <br><br>
    Observaciones
    <input type="text" name="observaciones" id="observaciones">

    <br><br>

    <input type="submit" value="guardar">

    </form>
     

    


<script>
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
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>