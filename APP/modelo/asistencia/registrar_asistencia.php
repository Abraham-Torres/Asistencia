<?php
include("../conexion.php");

session_start();

$correo = $_SESSION['usuario']['correo'];

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
$sql_empleado = $conexion->query("SELECT * FROM Empleado INNER JOIN  Puesto on Empleado.Puesto = Puesto.Id_Puesto WHERE Correo ='$correo'");

$filas = $sql_empleado->num_rows;
if($filas > 0){
  $data = $sql_empleado->fetch_assoc();
  echo $data['Nombre'];
  $nombre = $data['Nombre'];
$puesto = $data['Puesto'];
}else{
     echo "no hay datos";
}
$num_empleado = $data['Id_Empleado'];
$sql_jornada= $conexion->query("SELECT * FROM Jornada WHERE Id_Jornada = '$num_empleado';");


$filas_jornada = $sql_jornada->num_rows;


$data = $sql_jornada->fetch_assoc();
if($filas_jornada == 1 && $fecha == $data['Fecha']){
    
    echo $data['Fecha'];
    echo "ya existes en la bd con fecha";
}else{
     
    
    

// Resultado de ejemplo: 6:33 PM

$abrir = htmlentities($_POST['reg_asistencia']);
if(isset($abrir)){





$sql_reg_asistencia = "INSERT INTO Jornada(Id_Jornada,Empleado,Nombre,Estado,Puesto,Fecha,Entrada,Salida)
VALUES ('$num_empleado','$num_empleado','$nombre','Carga','$puesto','$fecha','$tiempo','00:00:00');";

if(mysqli_query($conexion,$sql_reg_asistencia)){

    $sql_update_activo = "UPDATE Empleado set Activo=true WHERE Id_Empleado = $num_empleado;";
    mysqli_query($conexion,$sql_update_activo);
    echo "datos ingresados";
}else{
    echo "error";
}
}
}












?>