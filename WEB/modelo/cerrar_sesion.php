<?php
session_start();
session_destroy();
header("location:../vistas/paginas/login.php");
?>