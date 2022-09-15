<?php
$server = "localhost";
$user = "root";
$pass = "";

$conn = mysqli_connect($server, $user, $pass);

if(!$conn){
    die("coneccion faillida". mysqli_connect_error());

}


$sql = "CREATE DATABASE asistencias";


if (mysqli_query($conn, $sql)) {
    echo "Base de datos creada correctamente";
    
} else {
    echo "Error creando la base de datos: " . mysqli_error($conn);
}



?>

