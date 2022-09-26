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
<div class="content mt-4">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Puestos Registrados</h3>

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
              <div class="card-body ">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Edad</th>
                      <th>Puesto</th>
                      <th><i class="fa fa-solid fa-user-slash"></i>Operacion</th>
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
                        <td>".$id."</td>
                        <td>".$nombre."</td>
                        <td>".$correo."</td>
                        <td>".$edad."</td>
                        <td>".$puesto."</td>
                        ";
                        ?>
                        <td><a class="btn btn-block btn-success" href="index.php?pagina=puestos/operacion_emp_eli&Id_empleado=<?php echo $id;?>" >Operaciones</a> </td>
                        <?php
                        echo "</tr>";
                          }
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
