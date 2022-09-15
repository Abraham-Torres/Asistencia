<?php
include("../conexion.php");

session_start();

$correo = $_SESSION['usuario']['correo'];
$id = $_SESSION['usuario']['id'];


// Resultado de ejemplo: 6:33 PM

$cerrar = htmlentities($_POST['reg_asistencia']);
if(isset($cerrar)){

ini_set('date.timezone','America/Monterrey');

$DateAndTime = date('m-d-Y h:i:s A', time());  
echo $id;
$mes = date('-m');
$dia = date('-d');
$year = date('y');
$hora = date('h:');
$minutos = date('i:');
$segundos = date('s');
$AM_PM = date('A');
$milenio = "20";
$fecha = $milenio . $year . $mes . $dia;
$tiempo = $hora . $minutos . $segundos ;


echo " HORA :";
echo $tiempo;

$sql_update_activo = "UPDATE Jornada set Salida = '$tiempo' WHERE Id_Jornada = '$id' and Fecha = '$fecha'; ";
    
if(mysqli_query($conexion,$sql_update_activo)){

    $sql_update_activo = "UPDATE Empleado set Activo=false WHERE Id_Empleado = $id; ";
    mysqli_query($conexion,$sql_update_activo);
    echo "datos ingresados";
}else{
    echo "error";
}
}













?>