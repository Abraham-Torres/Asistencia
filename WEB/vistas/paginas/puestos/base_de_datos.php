<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
  header("location:paginas/login.php");
  die();
}

$correo = $_SESSION['usuario']['correo'];
$sql_empleado = "SELECT * FROM Empleado INNER JOIN  Puesto on Empleado.Puesto = Puesto.Id_Puesto ;";

$resultado = mysqli_query($conexion,$sql_empleado);

$filas = mysqli_num_rows($resultado);


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

                  if($filas){
                      while($data = mysqli_fetch_array($resultado)){
                    echo "
                    <tr>
                    <td>".$data['Nombre']."</td>
                    <td>".$data['Correo']."</td>
                    <td>".$data['Edad']."</td>
                    <td>".$data['Puesto']."</td>
                    <td>".$data['Password']."</td>
                    ";
                    if($data['Activo']==true){
                      echo " <td><span class='badge bg-success'>Activo</span></td>";
                    }else{
                      echo " <td><span class='badge bg-danger'>Inactivo</span></td>";
                    }
                    echo "
                  </tr>
                  ";

                }
}else{
     
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
