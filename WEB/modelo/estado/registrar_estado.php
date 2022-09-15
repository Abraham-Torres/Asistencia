<?php
include("../conexion.php");
session_start();
$reg = htmlentities($_POST['reg_estado']);
if(isset($reg)){
    $Euesto = htmlentities($_POST['Estado']);
    

    $sql_reg_puesto = "INSERT INTO Estado (Estado) values 
    ('$Euesto')";
    if(mysqli_query($conexion,$sql_reg_puesto)){
        echo "datos ingresador correctamente";

    }else{
        echo "error en algo";
    }
}
?>
