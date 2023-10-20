
<?php
if(isset($_POST["export_data"])){
    if(!empty($row)){
        $filename = "Incidencias.xls";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=".$filename);

        $mostrar_colunmas = false;

        
    }

}

?>