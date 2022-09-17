<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
    header("location:login.php");
    die();
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="index.php?pagina=index" class="brand-link">
      <img src="vistas/recursos/dist/img/A-LOGO.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Aviva-Admin</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">PUESTOS</li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user fa-solid"></i>
                <p>Administrar
                <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?pagina=puestos/nuevo_empleado" class="nav-link">
                    <i class="fas fa-solid fa-file fa-circle fa-plus nav-icon"></i>
                    <p>Agregar</p>
                  </a>
                </li>
              </ul>
              <!--end-->

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?pagina=puestos/base_de_datos" class="nav-link">
                  <i class="fas fa-solid nav-icon fa-database"> </i>
                    <p>Base de Datos</p>
                  </a>
                </li>
              </ul>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="index.php?pagina=puestos/operaciones_empleado" class="nav-link">
                  <i class="fas fa-solid fa-screwdriver fa-wrench nav-icon"> </i>
                    <p>Operaciones</p>
                    
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-header">TIPO DE PUESTOS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-tie fa-solid"></i>
                <p>
                  Administrar
                  <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=tipo_puesto/operaciones" class="nav-link">
                  <i class="fas fa-solid fa-screwdriver fa-wrench nav-icon"></i>
                  <p>Operaciones</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">ASISTENCIAS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-solid fa-list fa-dropdown nav-icon"></i>
              <p>Administrar
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=asistencias/base_de_datos" class="nav-link">
                <i class="fas fa-solid nav-icon fa-database"> </i>
                  <p>Base de Datos</p>
                </a>
              </li>
             
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=puestos/administrar" class="nav-link">
                <i class="fas nav-icon fa-solid fa-screwdriver fa-wrench"></i>
                  <p>Operaciones</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">ESTADOS OPERATIVOS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sign"></i>
              <p>Administrar
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=estados/categorias" class="nav-link">
                <i class="fas fa-solid fa-screwdriver fa-wrench nav-icon"> </i>
                  <p>Operaciones</p>
                  
                </a>
              </li>
            </ul>
            
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>