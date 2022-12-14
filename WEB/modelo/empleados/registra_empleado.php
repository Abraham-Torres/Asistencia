<?php
session_start();
include("../conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../vistas/recursos/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <meta http-equiv="Refresh" content="5;../../index.php?pagina=puestos/nuevo_empleado">
  <link rel="stylesheet" href="../../vistas/recursos/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../vistas/recursos/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../vistas/recursos/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../vistas/recursos/dist/css/adminlte.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../vistas/recursos/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../vistas/recursos/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../vistas/recursos/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../vistas/recursos/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../vistas/recursos/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../vistas/recursos/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../vistas/recursos/plugins/summernote/summernote-bs4.min.css">
</head>
<body>
    <?php


$reg = filter_var($_POST['reg_emp'], FILTER_SANITIZE_STRING);
if(isset($reg)){
    $Nombre=filter_var($_POST['Nombre'],FILTER_SANITIZE_STRING);
    $Correo = filter_var($_POST['Correo'], FILTER_SANITIZE_STRING);
    $Edad = filter_var($_POST['Edad'], FILTER_SANITIZE_STRING);
    $Puesto = filter_var($_POST['Puesto'], FILTER_SANITIZE_STRING);
    $Password = filter_var($_POST['Password'], FILTER_SANITIZE_STRING);
    $Password2 = filter_var($_POST['Password2'], FILTER_SANITIZE_STRING);
    if($registrar_puesto = $conexion->prepare("INSERT INTO Empleado (Nombre,Correo,Edad,Puesto,Password,Activo) values (?,?,?,?,?,?)")){
        $activo = False;
        $registrar_puesto->bind_param('ssisss',$Nombre,$Correo,$Edad,$Puesto,$Password,$activo);
        if($registrar_puesto->execute()){
            echo "
            <div class='container container-sm mt-4'>
            <div class='card shadow'>
            <div class='row'>
                    <div class='col text-center'>
                    <h3>Registro Exitoso</h3>
                    <br>
                    <img src='../../vistas/recursos/dist/img/correcto.png' class='center-all-contens'>
                    </div>
                </div>
            <div class='card-body'>
                
                <div class='row'>
                    <div class='col text-center'>
                            <p class='lead text-center'>
                                La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
                                <a href='../../index.php?pagina=puestos/nuevo_empleado' class='btn btn-primary btn-lg mt-4'>Volver a administraci??n</a>
                            </p>
                    </div>
                </div>
                
            </div>
           </div>
            </div>
            ";
    }else{
       echo "
       <div class='container container-sm mt-4'>
       <div class='card shadow'>
       <div class='row'>
               <div class='col text-center'>
               <h3>Ha ocurrido un error al cargar la imagen</h3>
               <br>
               <img src='../../vistas/recursos/dist/img/incorrecto.png' class='center-all-contens'>
               </div>
           </div>
       <div class='card-body'>
           <div class='row'>
               <div class='col text-center'>
                       <p class='lead text-center'>
                           La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
                           <a href='../../index.php?pagina=puestos/nuevo_empleado' class='btn btn-danger btn-lg mt-4'>Volver a administraci??n</a>
                       </p>
               </div>
           </div>
       </div>
      </div>
       </div>
       ";
    }
}
}

?> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../vistas/recursos/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
    <script src="../../vistas/recursos/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
   
    <!-- AdminLTE App -->
    <script src="../../vistas/recursos/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../vistas/recursos/dist/js/demo.js"></script>
    <!-- Page specific script -->
    
</body>
</html>