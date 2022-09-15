<?php
include("conexion.php");
session_start();

$reg = filter_var($_POST['iniciar'], FILTER_SANITIZE_STRING);

if(isset($reg)){

    $Correo = filter_var($_POST['Correo'], FILTER_SANITIZE_STRING);
    $Pass = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);

   
   $admin = $conexion->query("SELECT * FROM Empleado where Correo = '$Correo' and Password = '$Pass'");
  
 
  
   $filas = $admin->num_rows;

    
   if($filas==1){
     $data = $admin->fetch_assoc();
     

     
     
     $_SESSION['usuario']['nombre'] = $data['Nombre'];
     $_SESSION['usuario']['correo'] = $data['Correo'];
     $_SESSION['usuario']['id'] = $data['Id_Empleado'];
     
          
     header("location:../index.php");
        
   }else{
    
        echo "error en algo";
   } 
   
        
        
}else{
    echo "error";
}


?>
