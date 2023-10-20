<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    require_once("connection.php");

    $id = $_POST['id'];

    $sql = "DELETE FROM profesores WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        header('Location: ../layouts_admins/profesores.php');
        exit;
    } else {
        echo '<script>alert("Error al eliminar al profesor:"); window.location = "../layouts_admins/profesores.php";</script>';
        exit;
    }
    $connection->close();
} else {
    echo "No se proporcionó ningún ID para eliminar.";
}
?>
