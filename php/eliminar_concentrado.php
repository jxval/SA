<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    require_once("connection.php");

    $id = $_POST['id'];

    $sql = "DELETE FROM revisiones WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo '<script>alert("Registro eliminado correctamente"); window.location = "../layouts_admins/concentrado.php";</script>';
        exit;
    } else {
        echo '<script>alert("Error al eliminar al profesor:"); window.location = "../layouts_admins/concentrado.php";</script>';
        exit;
    }
    $connection->close();
} else {
    echo "No se proporcionó ningún ID para eliminar.";
}
?>
