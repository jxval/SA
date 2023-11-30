<?php
session_start();
session_destroy();
header("location: ../layouts/inicio.php");
?>