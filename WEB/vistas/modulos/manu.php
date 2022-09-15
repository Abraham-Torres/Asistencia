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
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>PUESTOS
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=puestos/nuevo_empleado" class="nav-link">
                  <i class="far fa-user nav-icon fa-plus fa-circle"></i>
                  <p>REGISTRAR</p>
                  
                </a>
              </li>
            </ul>
            <!--end-->

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=puestos/base_de_datos" class="nav-link">
                <i class="fas fa-solid nav-icon fa-database"> </i>
                  <p>BASE DE DATOS</p>
                  
                </a>
              </li>
            </ul>
            <!--end-->

            <!--inicio del elemento para administrar-->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas nav-icon fa-solid fa-screwdriver fa-wrench"></i>
                
                  
                <p>ADMINISTRAR</p>
                <i class="fa fa-solid fa-bars right"></i>
                  
                  
                </a>
              <!--inicio del elemento de vista de arbol de eliminar-->
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=puestos/operaciones_empleado" class="nav-link">
               
                <p>ELIMINAR</p>
                </a>
              </li>
            </ul><!--fin de la vista de arbol-->

            <!--inicio del elemento de vista de arbol de modificar-->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=puestos/Datos_correctos" class="nav-link">
                
                  <p>MODIFICAR</p>
                </a>
              </li>
            </ul><!--fin de la vista de arbol-->
            <!--fin del elemento-->
              </li>
            </ul>
            <!--end-->

            <!--inicio del elemento de categorias-->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas nav-icon fa-solid fa-list "></i>
                
                  <p>CATEGORIAS</p>
                  <i class="fa fa-solid fa-bars right"></i>
                  
                </a>
              <!--inicio del elemento de vista de arbol de estados-->
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=puestos/administrar" class="nav-link">
               
                <p>ESTADOS</p>
                </a>
              </li>
            </ul><!--fin de la vista de arbol-->

            <!--inicio del elemento de vista de arbol de puestos-->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=puestos/categorias" class="nav-link">
                
                  <p>PUESTOS</p>
                </a>
              </li>
            </ul><!--fin de la vista de arbol-->
            <!--fin del elemento-->
              </li>
            </ul>
         
            <!--end-->

          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>ASISTENCIAS
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=asistencias/base_de_datos" class="nav-link">
                <i class="fas fa-solid nav-icon fa-database"> </i>
                  <p>BASE DE DATOS</p>
                  
                </a>
              </li>
              <!--end-->
              
            </ul>

            <!--inicio del elemento de categorias-->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=puestos/administrar" class="nav-link">
                <i class="fas nav-icon fa-solid fa-screwdriver fa-wrench"></i>
                
                  <p>ADMINISTRAR</p>
                  <i class="fa fa-solid fa-bars right"></i>
                </a>
                 <!--inicio del elemento de vista de arbol de estados-->
                 
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=puestos/" class="nav-link">
               
                <p>MODIFICAR</p>
                </a>
              </li>
            </ul><!--fin de la vista de arbol-->

              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>ESTADOS
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
           
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pagina=estados/categorias" class="nav-link">
                <i class="fas fa-solid nav-icon fa-database"> </i>
                  <p>BASE DE DATOS</p>
                  
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