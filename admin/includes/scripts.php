<!-- jQuery 3 -->
<!-- Memuat library jQuery versi 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- Memuat library jQuery UI versi 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->
<!-- Memuat library DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Mengatasi konflik antara jQuery UI tooltip dan Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<!-- Memuat library Bootstrap versi 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!-- Memuat library Raphael dan Morris.js untuk pembuatan grafik -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- ChartJS -->
<!-- Memuat library Chart.js untuk pembuatan grafik -->
<script src="../bower_components/chart.js/Chart.js"></script>
<!-- Sparkline -->
<!-- Memuat library jQuery Sparkline untuk pembuatan grafik -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- Memuat library jQuery jvectormap untuk peta interaktif -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<!-- Memuat library jQuery Knob untuk pembuatan grafik meteran -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<!-- Memuat library moment.js dan Bootstrap daterangepicker untuk pemilihan rentang tanggal -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<!-- Memuat library Bootstrap datepicker untuk pemilihan tanggal -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<!-- Memuat library Bootstrap time picker untuk pemilihan waktu -->
<script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- Memuat library Bootstrap WYSIHTML5 untuk editor teks kaya -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<!-- Memuat library jQuery Slimscroll untuk scrollbar kustom -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<!-- Memuat library FastClick untuk meningkatkan responsivitas pada perangkat sentuh -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- Memuat skrip utama AdminLTE -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- Memuat skrip demo dashboard AdminLTE -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Memuat skrip demo AdminLTE -->
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    // Inisialisasi DataTable dengan responsif untuk tabel #example1
    $('#example1').DataTable({
      responsive: true
    })
    // Inisialisasi DataTable untuk tabel #example2 dengan pengaturan khusus
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
$(function(){
  /** Tambahkan kelas aktif dan tetap terbuka ketika dipilih */
  var url = window.location;

  // untuk menu sidebar secara keseluruhan tapi tidak mencakup treeview
  $('ul.sidebar-menu a').filter(function() {
     return this.href == url;
  }).parent().addClass('active');

  // untuk treeview
  $('ul.treeview-menu a').filter(function() {
     return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
  
});
</script>
<script>
$(function(){
  // Date picker
  // Inisialisasi datepicker untuk #datepicker_add
  $('#datepicker_add').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })
  // Inisialisasi datepicker untuk #datepicker_edit
  $('#datepicker_edit').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  })

  // Timepicker
  // Inisialisasi timepicker untuk elemen dengan kelas .timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })

  // Date range picker
  // Inisialisasi date range picker untuk #reservation
  $('#reservation').daterangepicker()
  // Inisialisasi date range picker dengan time picker untuk #reservationtime
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
  // Date range sebagai tombol
  // Inisialisasi date range picker dengan tombol untuk #daterange-btn
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )
  
});
</script>
