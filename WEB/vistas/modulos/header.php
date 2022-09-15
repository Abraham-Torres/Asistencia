
<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
    header("location:login.php");
    die();
}

?>



<!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
    
      <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><?php
                    $user = $_SESSION['usuario']['correo'];
                    echo $user;
                  ?></a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="index.php?pagina=administrador/perfil" class="dropdown-item"><?php echo $_SESSION['usuario']['nombre'];  ?></a></li>
              <li><a href="modelo/cerrar_sesion.php" class="dropdown-item">Cerrar Sesion</a></li>

            </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->