
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
<div class="content mt-4 ">


<div class="row">
          <div class="col-12">
            <div class="card shadow">
              <div class="card-header">
                <h3 class="card-title">Tipos de Puesto</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tipo de Puesto</th>
                      <th><i class="fa fa-solid fa-user-slash"></i> Operacion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        if($filas){
                            while($data = mysqli_fetch_array($resultado)){
                              
                                echo "
                                <tr class='text-center'>
                                <td>".$data['Id_Puesto']."</td>
                                <td>".$data['Puesto']."</td>
                                
                               
                                ";
                                ?>
                                <td> 
                                <div class="modal fade" id="eliminar<?php echo $data['Id_Puesto'] ?>">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content text-center" >
                                      <div class="modal-header">
                                        <h4 class="modal-title">¿Esta Seguro de Eliminar <?php echo $data['Puesto'];?> ?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Cancelar">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-success" data-dismiss="modal">CANCELAR</button>
                                          <a href="modelo/puesto/eliminar_tipo_puesto.php?Puesto=<?php echo $data['Id_Puesto']?>" class="btn btn-danger borderedit">ELIMINAR</a>                           
                                        </div>
                                      </div>
                                      
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div><button type="button"  data-toggle="modal" data-target="#eliminar<?php echo $data['Id_Puesto'] ?>" class="btn btn-danger btn-sm btnOpenEdit">ELIMINAR </button> </td>
                                
                                <?php
                                 echo "</tr>";
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
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title">
                    AGREGAR NUEVO PUESTO
                </h3>           
            </div>
            <div class="card-body">
                    <form action="modelo/puesto/registrar_puesto.php" name="reg_puesto" id="reg_puesto" method="post">
                      <div class="row">
                        <div class="col">
                            <div class="form-group mb-3">
                              <input required type="text" class="form-control" name="Puesto" placeholder="Puesto" require>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col ">
                          <div class="form-group text-center">
                            <button type="submit" class="btn btn-success btn-md" name="reg_puesto" id="reg_puesto">Agregar</button>    
                          
                          </div>
                        </div>
                      </div>
                       
                       
                    </form>
                </div>
        </div>
    </div>
</div>

 </div>       
<!-- /.col (right) --</div>

