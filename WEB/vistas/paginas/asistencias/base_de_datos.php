<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
  header("location:paginas/login.php");
  die();
}

$correo = $_SESSION['usuario']['correo'];
$sql_empleado = "SELECT * FROM Jornada ;";

$resultado = mysqli_query($conexion,$sql_empleado);

$filas = mysqli_num_rows($resultado);


?>

<section class="content mt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
            <!-- /.card -->
            <div class="card shadow">
              <div class="card-header">
                <h3 class="card-title">Lista de Asistencia</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jornada</th>
                    <th>Fecha</th>
                    <th>Empleado</td>
                    <th>Puesto</th>
                    <th>Estado</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if($consulta_jornada = $conexion->prepare("SELECT * FROM Jornada")){
                    $consulta_jornada->execute();
                    $consulta_jornada-store_result();
                    if($consulta_jornada->num_rows == =){
                      echo "sin datos";

                    }else{
                      $consulta_jornada->bind_result($id,$fecha,$nombre,$puesto,$estado,$entrada,$salida);
                      while($consulta_jornada->fetch()){
                        echo "
                        <tr>
                        <td>".$id."</td>
                        <td>".$fecha."</td>
                        <td>".$nombre."</td>
                        <td>".$puesto."</td>
                        <td>".$estado."</td>
                        <td>".$entrada."</td>
                        <td>".$salida."</td>
                      </tr>
                      ";
                      }
                    }
                  }
                 
?>                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Jornada</th>
                    <th>Fecha</th>
                    <th>Empleado</th>
                    <th>Puesto</th>
                    <th>Estado</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                  
                  </tr>
                  </tfoot>
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
