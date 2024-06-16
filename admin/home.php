<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php';
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<style>
  .small-box {  /* Mengatur tampilan kotak kecil */
    border-radius: 5px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    margin-bottom: 20px;
    color: #fff;
  }
  .small-box h3 {  /* Mengatur tampilan judul dalam kotak kecil */
    font-size: 38px;
    font-weight: bold;
    margin: 0;
    padding: 0;
    white-space: nowrap;
  }
  .small-box p {  /* Mengatur tampilan paragraf dalam kotak kecil */
    font-size: 15px;
  }
  .small-box .icon {  /* Mengatur tampilan ikon dalam kotak kecil */
    top: -10px;
    right: 10px;
    z-index: 0;
  }
  .small-box .inner {  /* Mengatur tampilan isi dalam kotak kecil */
    padding: 10px;
  }
  .bg-aqua {  /* Mengatur warna latar belakang kotak kecil biru */
    background-color: #a9d2eb !important;
  }
  .bg-green {  /* Mengatur warna latar belakang kotak kecil hijau */
    background-color: #b6ded9 !important;
  }
  .bg-yellow {  /* Mengatur warna latar belakang kotak kecil kuning */
    background-color: #fbbe99 !important;
  }
  .bg-red {  /* Mengatur warna latar belakang kotak kecil merah */
    background-color: #eba9b1 !important;
  }
  .content-wrapper, .main-footer, .main-header, .main-sidebar {  /* Mengatur latar belakang elemen utama menjadi putih */
    background-color: #fafafa !important;
  }
  .content {  /* Mengatur latar belakang konten menjadi putih */
    background-color: #fafafa !important;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini" style="background-color: #faf9f7;">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard  <!-- Judul halaman dashboard -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>  <!-- Breadcrumb untuk navigasi halaman -->
      </ol>
    </section>

    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM employees";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Total Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="employee.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM attendance";
                $query = $conn->query($sql);
                $total = $query->num_rows;

                $sql = "SELECT * FROM attendance WHERE status = 1";
                $query = $conn->query($sql);
                $early = $query->num_rows;
                
                $percentage = ($early/$total)*100;

                echo "<h3>".number_format($percentage, 2)."<sup style='font-size: 20px'>%</sup></h3>";
              ?>
          
              <p>Persentase Tepat Waktu</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM attendance WHERE date = '$today' AND status = 1";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
             
              <p>On Time Today</p>
            </div>
            <div class="icon">
              <i class="ion ion-clock"></i>
            </div>
            <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM attendance WHERE date = '$today' AND status = 0";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>

              <p>Terlambat Hari Ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="attendance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Kehadiran Bulanan</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Pilih Tahun: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:350px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      </section>
    </div>
    <?php include 'includes/footer.php'; ?>

</div>

<?php
  $and = 'AND YEAR(date) = '.$year;
  $months = array();
  $ontime = array();
  $late = array();
  for( $m = 1; $m <= 12; $m++ ) {
    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 1 $and";
    $oquery = $conn->query($sql);
    array_push($ontime, $oquery->num_rows);

    $sql = "SELECT * FROM attendance WHERE MONTH(date) = '$m' AND status = 0 $and";
    $lquery = $conn->query($sql);
    array_push($late, $lquery->num_rows);

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $late = json_encode($late);
  $ontime = json_encode($ontime);

?>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Late',
        fillColor           : '#eba9b1',
        strokeColor         : '#eba9b1',
        pointColor          : '#eba9b1',
        pointStrokeColor    : '#eba9b1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#eba9b1',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : '#b6ded9',
        strokeColor         : '#b6ded9',
        pointColor          : '#b6ded9',
        pointStrokeColor    : '#b6ded9',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#b6ded9',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#b6ded9'
  barChartData.datasets[1].strokeColor = '#b6ded9'
  barChartData.datasets[1].pointColor  = '#b6ded9'
  var barChartOptions                  = {
    scaleBeginAtZero        : true,
    scaleShowGridLines      : true,
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    scaleGridLineWidth      : 1,
    scaleShowHorizontalLines: true,
    scaleShowVerticalLines  : true,
    barShowStroke           : true,
    barStrokeWidth          : 2,
    barValueSpacing         : 5,
    barDatasetSpacing       : 1,
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>
