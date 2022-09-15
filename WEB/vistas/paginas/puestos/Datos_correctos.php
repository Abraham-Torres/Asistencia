
<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
  header("location:paginas/login.php");
  die();
}

$correo = $_SESSION['usuario']['correo'];
$sql_Puesto = "SELECT * FROM Puesto;";

$resultado = mysqli_query($conexion,$sql_Puesto);

$filas = mysqli_num_rows($resultado);


?>


<!-- general form elements -->
<div class="content mt-4">
<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Datos ingresados correctamente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                    
                <!-- /.card-body -->

                <div class="card-footer">
                  <center>
                  <a class="btn btn-block btn-danger" href="vistas/login.php">Regresar</a></center>
                </div>
              </form>
            </div>
            <!-- /.card -->
</div>
