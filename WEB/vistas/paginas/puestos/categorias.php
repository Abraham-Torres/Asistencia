
<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
  header("location:paginas/login.php");
  die();
}

$correo = $_SESSION['usuario']['correo'];
$sql_Puesto = "SELECT * FROM Puesto;";

$resultado = mysqli_query($conexion,$sql_Puesto);

$filas = mysqli_num_rows($resultado);


?>
<div class="content mt-4 shadow">


<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categorias Puesto</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                      <th>Puesto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        if($filas){
                            while($data = mysqli_fetch_array($resultado)){
                                echo "
                                <tr>
                                <td>".$data['Id_Puesto']."</td>
                                <td>".$data['Puesto']."</td>
                                </tr>
                                ";
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


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    AGREGAR NUEVO PUESTO
                </h3>
                
            </div>
            <div class="card-body">
                    <form action="modelo/puesto/registrar_puesto.php" name="reg_puesto" id="reg_puesto" method="post">
                        <div class="input-group mb-3">
                        <input required type="text" class="form-control" name="Puesto" placeholder="Puesto" require>
                            
                       </div>
                        <div class="input-group mb-3">
                        <button type="submit" class="btn btn-success form-control" name="reg_puesto" id="reg_puesto">Agregar</button>    
                        
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

 </div>       
<!-- /.col (right) --</div>

