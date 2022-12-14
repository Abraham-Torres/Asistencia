
<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['usuario']['correo'];
if($varsesion == null || $varsesion = ''){
  header("location:paginas/login.php");
  die();
}
$correo = $_SESSION['usuario']['correo'];
$consulta_activos = $conexion->prepare("SELECT * FROM Empleado WHERE Activo = true");
$consulta_inactivos = $conexion->prepare("SELECT * FROM Empleado WHERE Activo = false");
$consulta_activos->execute();
$consulta_activos->store_result();
$consulta_inactivos->execute();
$consulta_inactivos->store_result();
$activo = $consulta_activos->num_rows;
$inactivo = $consulta_inactivos->num_rows;
?>


<section class="container mt-4">
        <div class="row">
            <div class="col ">
                        <!-- small box -->
                        <div class="small-box bg-success shadow">
                          <div class="inner">
                              <h3><?php echo $activo; ?><sup style="font-size: 20px"></sup></h3>
                              <p>Puestos Activos</p>
                          </div>
                        <div class="icon">
                          <i class="ion ion-person"></i>
                          </div>
                        </div>
            </div>
          <div class="col">
                    <!-- small box -->
                    <div class="small-box bg-danger shadow">
                      <div class="inner">
                          <h3><?php echo $inactivo; ?><sup style="font-size: 20px"></sup></h3>
                          <p>Puestos Inactivos</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-person"></i>
                      </div>
                    </div>
          </div>
          </div>
          <div class="card bg-gradient-warning" style="position: relative; left: 0px; top: 0px;">
              <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendario
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52" aria-expanded="false">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">August 2022</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Do</th><th class="dow">Lu</th><th class="dow">Ma</th><th class="dow">Mi</th><th class="dow">Ju</th><th class="dow">Vi</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="07/31/2022" class="day old weekend">31</td><td data-action="selectDay" data-day="08/01/2022" class="day">1</td><td data-action="selectDay" data-day="08/02/2022" class="day">2</td><td data-action="selectDay" data-day="08/03/2022" class="day">3</td><td data-action="selectDay" data-day="08/04/2022" class="day">4</td><td data-action="selectDay" data-day="08/05/2022" class="day">5</td><td data-action="selectDay" data-day="08/06/2022" class="day weekend">6</td></tr><tr><td data-action="selectDay" data-day="08/07/2022" class="day weekend">7</td><td data-action="selectDay" data-day="08/08/2022" class="day">8</td><td data-action="selectDay" data-day="08/09/2022" class="day">9</td><td data-action="selectDay" data-day="08/10/2022" class="day">10</td><td data-action="selectDay" data-day="08/11/2022" class="day">11</td><td data-action="selectDay" data-day="08/12/2022" class="day">12</td><td data-action="selectDay" data-day="08/13/2022" class="day weekend">13</td></tr><tr><td data-action="selectDay" data-day="08/14/2022" class="day weekend">14</td><td data-action="selectDay" data-day="08/15/2022" class="day">15</td><td data-action="selectDay" data-day="08/16/2022" class="day">16</td><td data-action="selectDay" data-day="08/17/2022" class="day">17</td><td data-action="selectDay" data-day="08/18/2022" class="day">18</td><td data-action="selectDay" data-day="08/19/2022" class="day">19</td><td data-action="selectDay" data-day="08/20/2022" class="day weekend">20</td></tr><tr><td data-action="selectDay" data-day="08/21/2022" class="day weekend">21</td><td data-action="selectDay" data-day="08/22/2022" class="day">22</td><td data-action="selectDay" data-day="08/23/2022" class="day">23</td><td data-action="selectDay" data-day="08/24/2022" class="day">24</td><td data-action="selectDay" data-day="08/25/2022" class="day">25</td><td data-action="selectDay" data-day="08/26/2022" class="day">26</td><td data-action="selectDay" data-day="08/27/2022" class="day weekend">27</td></tr><tr><td data-action="selectDay" data-day="08/28/2022" class="day weekend">28</td><td data-action="selectDay" data-day="08/29/2022" class="day">29</td><td data-action="selectDay" data-day="08/30/2022" class="day">30</td><td data-action="selectDay" data-day="08/31/2022" class="day active today">31</td><td data-action="selectDay" data-day="09/01/2022" class="day new">1</td><td data-action="selectDay" data-day="09/02/2022" class="day new">2</td><td data-action="selectDay" data-day="09/03/2022" class="day new weekend">3</td></tr><tr><td data-action="selectDay" data-day="09/04/2022" class="day new weekend">4</td><td data-action="selectDay" data-day="09/05/2022" class="day new">5</td><td data-action="selectDay" data-day="09/06/2022" class="day new">6</td><td data-action="selectDay" data-day="09/07/2022" class="day new">7</td><td data-action="selectDay" data-day="09/08/2022" class="day new">8</td><td data-action="selectDay" data-day="09/09/2022" class="day new">9</td><td data-action="selectDay" data-day="09/10/2022" class="day new weekend">10</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2022</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month active">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year active">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
              </div>
              <!-- /.card-body -->
            </div>

</section>


  <!-- /.col (right) --</div>




