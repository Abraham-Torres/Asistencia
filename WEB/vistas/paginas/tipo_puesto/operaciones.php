
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
                    if($consulta_puesto = $conexion->prepare("SELECT * FROM Puesto")){
                      $consulta_puesto->execute();
                      $consulta_puesto->store_result();
                      if($consulta_puesto->num_rows == 0){
                        echo "sin datos";
                      }else{
                        $consulta_puesto->bind_result($id,$puesto);
                        while($consulta_puesto->fetch()){
                          echo "
                          <tr class='text-center'>
                          <td>".$id."</td>
                          <td>".$puesto."</td>
                          ";
                          ?>
                          <td> 
                          <div class="modal fade" id="eliminar<?php echo $id; ?>">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content text-center" >
                                <div class="modal-header">
                                  <h4 class="modal-title">¿Esta Seguro de Eliminar <?php echo $puesto;?> ?</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Cancelar">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">CANCELAR</button>
                                    <a href="modelo/puesto/eliminar_tipo_puesto.php?Puesto=<?php echo $id;?>" class="btn btn-danger borderedit">ELIMINAR</a>                           
                                  </div>
                                </div>
                                
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div><button type="button"  data-toggle="modal" data-target="#eliminar<?php echo $id; ?>" class="btn btn-danger btn-sm btnOpenEdit">ELIMINAR </button> </td>
                          
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

