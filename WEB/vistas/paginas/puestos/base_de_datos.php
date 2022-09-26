<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
  header("location:paginas/login.php");
  die();
}

$correo = $_SESSION['usuario']['correo'];

?>

<section class="content mt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de Puestos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Edad</th>
                    <th>Puesto</th>
                    <th>Contraseña</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if($consulta_empleado = $conexion->prepare("SELECT * FROM Empleado")){
                    $consulta_empleado->execute();
                    $consulta_empleado->store_result();
                    if($consulta_empleado->num_rows == 0){
                      echo "sin datos";
                    }else{
                      $consulta_empleado->bind_result($id,$nombre,$correo,$edad,$puesto,$password,$activo);
                      while($consulta_empleado->fetch()){
                        echo "
                    <tr>
                    <td>".$nombre."</td>
                    <td>".$correo."</td>
                    <td>".$edad."</td>
                    <td>".$puesto."</td>
                    <td>".$password."</td>
                    ";
                    if($activo==true){
                      echo " <td><span class='badge bg-success'>Activo</span></td>";
                    }else{
                      echo " <td><span class='badge bg-danger'>Inactivo</span></td>";
                    }
                    echo "
                  </tr>
                  ";

                      }
                    }
                  }
                 
?>                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

        
<!-- /.col (right) --</div>
