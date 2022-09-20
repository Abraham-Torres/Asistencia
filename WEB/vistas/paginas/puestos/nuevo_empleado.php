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
<section class="content mt-4">
<div class="row col-sm">
    <div class="card-body register-card-body shadow">
      <p class="login-box-msg text-center">REGISTRAR NUEVO MIEMBRO</p>
      <form action="modelo/empleados/registra_empleado.php" method="post" name="reg_emp" id="reg_emp">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="Nombre" placeholder="Nombre Completo" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="Correo" placeholder="Correo" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" name="Edad" placeholder="Edad"require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">  
                        <select class="form-control" name="Puesto">
                          <?php
                          if($consulta_puesto = $conexion->prepare("SELECT Puesto FROM Puesto")){
                            $consulta_puesto->execute();
                            $consulta_puesto->store_result();
                            if($consulta_puesto->num_rows == 0){
                              echo "sin resultado";
                            }
                            $consulta_puesto->bind_result($puestos);
                            while($consulta_puesto->fetch()) {
                              echo "
                              <option value='$puestos'>$puestos</option>
                              ";
                            }

                          }
                          ?>
                          
                        </select>
                        <div class="input-group-append">
                          <div class="input-group-text">
                           <span class="fas fa-solid fa-user"></span>
                          </div>
                        </div>         
        </div>   
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="Password" placeholder="Contraseña" require >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="Password2" placeholder="Confirmar Contraña" require>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block" name="reg_emp" id="reg_emp">Registrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div>       
</section>
        
          <!-- /.col (right) --</div>


        </section>
