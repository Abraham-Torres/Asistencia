<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "asistencia";
$conexion = new mysqli($server, $user, $pass, $db);
if($conexion){
}
else{
  echo "NO EXISTE BASE DE DATOS ";
}
?>
