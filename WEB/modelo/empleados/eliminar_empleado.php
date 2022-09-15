<?php
include("../conexion.php");
session_start();

    $eliminar=$_GET['Id_Empleado'];


   $sql_elim_emp = "DELETE FROM Empleado WHERE Id_Empleado= '$eliminar'"; 
   if(mysqli_query($conexion,$sql_elim_emp)){
      header("Location:../../vistas/paginas/puestos/eliminar_empleado.php");
     

   }else{
       echo "error en algo";
   }


?>