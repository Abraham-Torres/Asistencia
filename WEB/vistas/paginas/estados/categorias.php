
<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
  header("location:paginas/login.php");
  die();
}

$correo = $_SESSION['usuario']['correo'];
$sql_Estado = "SELECT * FROM Estado;";

$resultado = mysqli_query($conexion,$sql_Estado);

$filas = mysqli_num_rows($resultado);


?>
<div class="content mt-4 shadow">


<div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categorias Estado</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Estado</th>
                      <th><i class="fa fa-solid fa-user-slash"></i>Operacion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        if($filas){
                            while($data = mysqli_fetch_array($resultado)){
                                echo "
                                <tr class='text-center'>
                                <td>".$data['Id_Estado']."</td>
                                <td>".$data['Estado']."</td>
                                ";?>
                                <td>
                                <div class="modal fade" id="eliminar<?php echo $data['Id_Estado'] ?>">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content text-center" >
                                      <div class="modal-header">
                                        <h4 class="modal-title">¿Esta Seguro de Eliminar <?php echo $data['Estado'];?> ?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cancelar">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-success" data-dismiss="modal">CANCELAR</button>
                                          <a href="modelo/estado/eliminar.php?Estado=<?php echo $data['Id_Estado']?>" class="btn btn-danger borderedit">ELIMINAR</a>                           
                                        </div>
                                      </div>
                                      
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div><button type="button"  data-toggle="modal" data-target="#eliminar<?php echo $data['Id_Estado'] ?>" class="btn btn-danger btn-sm btnOpenEdit">ELIMINAR </button> </td>
                                
                              <?php
                              echo  " </tr>";
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
                    AGREGAR NUEVO ESTADO
                </h3>
                
            </div>
            <div class="card-body">
                    <form action="modelo/estado/registrar_estado.php" name="reg_estado" id="reg_estado" method="post">
                        <div class="input-group mb-3">
                        <input required type="text" class="form-control" name="Estado" placeholder="Estado" require>
                            
                       </div>
                        <div class="input-group mb-3">
                        <button type="submit" class="btn btn-success form-control" name="reg_estado" id="reg_puesto">Agregar</button>    
                        
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

 </div>       
<!-- /.col (right) --</div>

