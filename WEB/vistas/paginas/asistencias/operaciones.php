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
                  if($filas){
                      while($data = mysqli_fetch_array($resultado)){
                    echo "
                    <tr>
                    <td>".$data['Id_Jornada']."</td>
                    <td>".$data['Fecha']."</td>
                    <td>".$data['Nombre']."</td>
                    <td>".$data['Puesto']."</td>
                    <td>".$data['Estado']."</td>
                    <td>".$data['Entrada']."</td>
                    <td>".$data['Salida']."</td>
                  </tr>
                  ";
                }
}else{
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
