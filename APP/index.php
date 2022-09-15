<?php


session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
    header("location:vistas/paginas/login.php");
    die();
}

    include "controlador/plantilla.controlador.php";
   

    
    $plantilla = new ControladorPlantilla();
    $plantilla->ctrPlantilla();
    

    

?>