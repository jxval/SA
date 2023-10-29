<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    require_once("connection.php");

    $id = $_POST['id'];

    $sql = "DELETE FROM carreras WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        header('Location: ../layouts_admins/carreras.php');
        exit;
    } else {
        echo '<script>alert("Error al eliminar la carrera:"); window.location = "../layouts_admins/carreras.php";</script>';
        exit;
    }
    $connection->close();
} else {
    echo "No se proporcionó ningún ID para eliminar.";
}
?>
