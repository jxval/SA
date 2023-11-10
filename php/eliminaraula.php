<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    require_once("connection.php");

    $id = $_POST['id'];

    $sql = "DELETE FROM aulas WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        header('Location: ../layouts_admins/aulas.php');
        exit;
    } else {
        echo '<script>alert("Error al eliminar grupo:"); window.location = "../layouts_admins/aulas.php";</script>';
        exit;
    }
    $connection->close();
} else {
    echo "No se proporcionó ningún ID para eliminar.";
}
?>