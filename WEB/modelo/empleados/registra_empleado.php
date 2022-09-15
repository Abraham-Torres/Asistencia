<?php
include("../conexion.php");
session_start();
$reg = htmlentities($_POST['reg_emp']);
if(isset($reg)){
    $Nombre= htmlentities($_POST['Nombre']);
    $Correo = htmlentities($_POST['Correo']);
    $Edad = htmlentities($_POST['Edad']);
    $Puesto = htmlentities($_POST['Puesto']);
    $Password = htmlentities($_POST['Password']);
    $Password2 = htmlentities($_POST['Password2']);

    $sql_reg_emp = "INSERT INTO Empleado (Nombre,Correo,Edad,Password,Puesto,Activo) values 
    ('$Nombre','$Correo','$Edad','$Password','$Puesto',false)";
    if(mysqli_query($conexion,$sql_reg_emp)){
    //Fucionamiento pendiente, el boton no redirecciona bien
echo "<div class='content mt-4'>";
echo "<div class='card card-success'>";
             echo "<div class='card-header'>";
              echo "<h3 class='card-title'>Datos ingresados correctamente</h3>";
              echo "</div>";
             
             echo "<form>";
                echo "<div class='card-body'>";
                    
                echo"<div class='card-footer'>";
                 echo "<center>";
                 
                 echo"<a class='btn btn-block btn-danger' href='/../WEB/index.php'>Regresar</a>";
               echo "</div>";
              echo"</form>";
            echo"</div>";
echo"</div>";
    }else{
        echo "error en algo";
    }
}
?>
