<?php
session_start();
error_reporting(0);
$Correo = $_SESSION['usuario']['correo'];
if($Correo == null || $Correo = ''){
    header("location:login.php");
    die();
}


$correo = $_SESSION['usuario']['correo'];

$sql_empleado = $conexion->query("SELECT * FROM 	Empleado INNER JOIN  Puesto on Empleado.Puesto = Puesto.Id_Puesto WHERE Correo ='$correo'");

$filas = $sql_empleado->num_rows;
if($filas > 0){
  $data = $sql_empleado->fetch_assoc();
  
}else{
     echo "no hay datos";
}


?>   
    <section class="content">
    
    <div class="col-sm mt-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white"
                   style="background: no-repeat center/100% url('vistas/recursos/dist/img/zyro-image.png');">
                <h3 class="widget-user-username text-right"><?php echo $data['Nombre']; ?></h3>
                <h5 class="widget-user-desc text-right"><?php echo $data['Puesto'] ?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="vistas/recursos/dist/img/user3-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">NUMERO DE EMPLEADO</h5>
                      <span class="description-text"><?php echo $data['Id_Empleado']; ?></span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">EDAD</h5>
                      <span class="description-text"><?php echo $data['Edad']; ?></span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">TELEFONO</h5>
                      <span class="description-text"><?php echo $data['Telefono']; ?></span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>



          
            <!-- /.widget-user -->
            <div class="card card-widget widget-user shadow">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <H3 class="widget-user-username"><?php
  ini_set('date.timezone','America/Monterrey');
$DateAndTime = date('m-d-Y h:i', time());  
echo $DateAndTime;
?> </H3>
                
              </div>
              
              
              <?php
                      if($data['Activo']==false){
                      echo "      

                      <form class='widget-user-image' action='modelo/asistencia/registrar_asistencia.php' id='id_asistencia' method='POST' name='reg_asistencia'>
                        
              <button class='btn btn-app bg-success' type='submit' id='reg_asistencia' name='reg_asistencia'>
                  
                  
                   
                  <i class='fas fa-calendar-check'></i> ENTRADA
</button>
</form>
";
}
elseif($data['Activo']==true){
echo "      
<form class='widget-user-image' action='modelo/asistencia/cerrar_asistencia.php' id='id_asistencia' method='POST' name='reg_asistencia'>
                
              <button class='btn btn-app bg-danger' type='submit' id='reg_asistencia' name='reg_asistencia'>
                  
                  
                   
                  <i class='fas fa-calendar-check'></i> SALIDA
</button>
</form>
";

}?>

              <div class="card-footer">
             
                <!-- /.row -->
              </div>
            </div>
    </div>

    <div class="col"></div>

    </section>


    

 