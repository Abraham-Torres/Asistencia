<?php


$server = "localhost";
$user = "root";
$pass = "Cop07234";
$db = "asistencia";

$conexion = new mysqli($server, $user, $pass, $db);

if($conexion){
  
}
else{
  echo "NO EXISTE BASE DE DATOS ";
    

}

?>
