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
<div class="content mt-4">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ELIMINAR MIEMBRO</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Buscar">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Edad</th>
                      <th>Puesto</th>
                      <th>Contraseña</th>
                      <th><i class="fa fa-solid fa-user-slash"></i>Operacion</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php

                  if($filas){
                      while($data = mysqli_fetch_array($resultado)){
                    echo "
                    <tr>
                    <td>".$data['Id_Empleado']."</td>
                    <td>".$data['Nombre']."</td>
                    <td>".$data['Correo']."</td>
                    <td>".$data['Edad']."</td>
                    <td>".$data['Puesto']."</td>
                    <td>".$data['Password']."</td>
                    ";
                    ?>
                    <td><a class="btn btn-block btn-success" href="vistas/paginas/puestos/operacion_emp_eli.php?Id_empleado=<?php echo $data['Id_Empleado'];?>" >Operaciones</a> </td>
                    
                    <?php
                      }
                    }

                    ?>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
                  </div>
         <!-- /.col (right) --</div>
