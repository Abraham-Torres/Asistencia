<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
  header("location:paginas/login.php");
  die();
}

$operacion_emp=$_GET['Id_empleado'];
echo $operacion_emp;
$correo = $_SESSION['usuario']['correo'];
$sql_puesto = "SELECT * FROM Puesto ";
$puesto = mysqli_query($conexion,$sql_puesto);
$repsuesta = mysqli_num_rows($puesto);


?>
<?php
    include "../../modulos/header.php";

?>
  <!-- Google Font: Source Sans Pro -->
  <?php
    include "../../modulos/styles.php";
?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php
    include "../../modulos/manu.php";

?>
 <section class="content mt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../WEB/imagenes/profile/lalo.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">[user name]</h3>

                <p class="text-muted text-center">[puesto]</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Estado</b> <div class="float-right btn btn-primary">carga</div>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

                     </div><!--este si sirve xd-->
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Informacion general</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuracion</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post informacion general -->
                    <div class="post">
                      
                      <!-- /.user-block -->
                      <div class="row">
                        <div class="col">
                      <div class="form-group">
                        <small>correo electronico</small>
                        <button type="button" data-toggle="modal" data-target="#correo" class="btn btn-xs btn-link btnOpenEdit"><i class="fa-solid fas fa-pen"></i> Editar</button>
                        <p id="correo">
                            <span class="text-muted">
                                [email-user]
                            </span>
                        </p>
                            </div><!--/form-group-->
                                </div><!--col-->

                        <div class="col">
                      <div class="form-group">
                        <small>RFC</small>
                        <button type="button" data-toggle="modal" data-target="#RFC" class="btn btn-xs btn-link btnOpenEdit"><i class="fa-solid fas fa-pen"></i> Editar</button>
                        <p id="RFC">
                            <span class="text-muted">
                                [RFC-user]
                            </span>
                        </p>
                            </div><!--/form-group-->
                                </div><!--col-->

                                    </div><!--row-->
                            <div class="row">
                            <div class="col">
                      <div class="form-group">
                        <small>RFC</small>
                        <button type="button" data-toggle="modal" data-target="#razonSocial" class="btn btn-xs btn-link btnOpenEdit"><i class="fa-solid fas fa-pen"></i> Editar</button>
                        <p id="razonSocial">
                            <span class="text-muted">
                                [Razon social-user]
                            </span>
                        </p>
                            </div><!--/form-group-->
                                </div><!--col-->
                                </div><!--row-->        
                    </div>
                    <!-- /.post informacion general -->

                </div><!--este tambien sirve xd-->
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                    <h3>Cambiar contraseña</h3>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">contraseña nueva</label>
                        <div class="col-sm-4">
                          <input type="password" class="form-control" id="password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Confirmar contraseña</label>
                        <div class="col-sm-4">
                          <input type="password" class="form-control" id="confpassword">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Cambiar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="card">
            <div class="card-title">
                <center>
                <h3>OPERACIONES </h3>
                </center>
    </div>
  <div class="card-body">
    <center>
<div class="btn btn-danger">ELIMINAR MIEMBRO <i class="fa fa-trash"></i></div>
    </center>
  </div>
</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

