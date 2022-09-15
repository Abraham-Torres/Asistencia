<?php
include("conexion.php");
session_start();

$iniciar = htmlentities($_POST['iniciar']);
$start= filter_var($iniciar, FILTER_SANITIZE_STRING);
if(isset($start)){
    $Correo = filter_var($_POST['Correo'], FILTER_SANITIZE_STRING);
    $Pass = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
    
   
   $admin = $conexion->query("SELECT * FROM Administrador where Correo ='$Correo' and Password = '$Pass'");
   
   
   $filas = $admin->num_rows;
    echo $filas;
   if($filas == 1){
     $data = $admin->fetch_assoc();
     
     $_SESSION['usuario']['nombre'] = $data['Nombre'];
     $_SESSION['usuario']['correo'] = $data['Correo'];
     
          
        
        header("location:../index.php");
   }else{
    
        echo "error en algo";
   } 
   
        
        
}else{
    echo "error";
}


?>
