<?php
session_start();
include("conexion.php");

$iniciar = filter_var($_POST['iniciar'], FILTER_SANITIZE_STRING);
$start= filter_var($iniciar, FILTER_SANITIZE_STRING);
if(isset($start)){

    $Correo = filter_var($_POST['Correo'], FILTER_SANITIZE_STRING);
    $Pass = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
    
    if ($stmt = $conexion->prepare("SELECT * FROM Administrador WHERE Correo=? AND Password=?")) {
	
        /* ligar parámetros para marcadores */
        $stmt->bind_param("ss", $Correo, $Pass);
    
        /* ejecutar la consulta */
        $stmt->execute();
    
        /* ligar variables de resultado */
        $stmt->bind_result($id,$nombre,$correo,$edad,$password);
        
        /* obtener valor */
        
        
        if(!$result = $stmt->fetch() ){
            echo "error de contrasena";
        }else{
            echo $nombre;
            echo $id;
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['correo'] = $correo;
            
        }
        
    
        /* cerrar sentencia */
        $stmt->close();
    }else{
        echo "sin consulta";
    }

}
    
    /* cerrar conexión */
    $conexion->close();
    

?>
