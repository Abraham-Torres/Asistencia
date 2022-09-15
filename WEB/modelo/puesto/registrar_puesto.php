<?php
include("../conexion.php");
session_start();
$reg = htmlentities($_POST['reg_puesto']);
if(isset($reg)){
    $Puesto = htmlentities($_POST['Puesto']);
    

    $sql_reg_puesto = "INSERT INTO Puesto (Puesto) values 
    ('$Puesto')";
    if(mysqli_query($conexion,$sql_reg_puesto)){
        echo "datos ingresador correctamente";

    }else{
        echo "error en algo";
    }
}
?>
