<?php
require_once 'connection.php';

if (isset($_POST['export_to_excel_CGP'])) {
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=Reportes_sin_justificar_" . date('Y_m_d') . ".xls");
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
?>