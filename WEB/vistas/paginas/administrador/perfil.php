<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
  header("location:paginas/login.php");
  die();
}

$correo = $_SESSION['usuario']['correo'];
$sql_empleado = "SELECT * FROM empleado INNER JOIN  Puesto on empleado.Puesto = Puesto.Id_Puesto WHERE Correo = '$correo';";

$resultado = mysqli_query($conexion,$sql_empleado);

$filas = mysqli_num_rows($resultado);

echo "ADMIN";

?>



<!-- /.col (right) --</div>