<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
    header("location:paginas/login.php");
    die();
}

include("modelo/conexion.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administrador</title>

  <!-- Google Font: Source Sans Pro -->
  <?php
    include "vistas/modulos/styles.php";
?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 <?php
    include "vistas/modulos/header.php";

?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php
    include "vistas/modulos/manu.php";

?>

<div class="content-wrapper">

<?php
    
  if(isset($_GET["pagina"])){
    if($_GET["pagina"]=="asistensias" ||
        $_GET["pagina"]=="roles" ||
        $_GET["pagina"]=="puestos/base_de_datos"||
        $_GET["pagina"]=="puestos/nuevo_empleado"||
        $_GET["pagina"]=="puestos/administrar"||
        $_GET["pagina"]=="puestos/categorias"||
        $_GET["pagina"]=="index" ||
        $_GET["pagina"]=="administrador/perfil"||
        $_GET["pagina"]=="estados/categorias"||
        $_GET["pagina"]=="puestos/Datos_correctos"||
        $_GET["pagina"]=="puestos/operaciones_empleado"||
        $_GET["pagina"]=="asistencias/base_de_datos"||
        $_GET["pagina"]=="puestos/operacion_emp_eli"||
        $_GET["pagina"]=="modelo/empleados/registra_empleado")
        
        
    {
      include "paginas/". $_GET["pagina"].".php";
    }
  }
  else{
    include "paginas/index.php";
  }

?>

</div>
  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php
include "vistas/modulos/footer.php";
?>
<!-- jQuery -->

<?php
    include "vistas/modulos/scripts.php";
?>
</body>
</html>
