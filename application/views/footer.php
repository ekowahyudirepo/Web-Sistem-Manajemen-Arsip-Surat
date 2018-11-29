</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 Built Tim Kerja Praktek 2017 <a href="http://unipdu.ac.id">UNIPDU </a> Jombang Theme by <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> 
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        
        <!-- /.control-sidebar-menu -->

      </div>
      
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- sweet alert -->
<script src="<?= base_url() ?>/assets/sweetalert.min.js"></script>
<!-- jQuery 3 -->
<script src="<?= base_url() ?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script>
  $('.delete').on('click',function(){
     $tujuan = $(this).attr('href');
     swal({
        title: "Anda yakin?",
        text: "untuk melanjutkan !",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Yakin!',
        closeOnConfirm: false,
        showLoaderOnConfirm: true
      },
      function(){ 
        window.location = $tujuan;
      });

     return false;
  })

  $(function() {
    $('.upload').addClass('disabled')
    //file validasi
    $('#file').change(function () {

        if (this.files.length > 0) {

            $.each(this.files, function (index, value) {

              var Fukuran = value.size;
              var Ftype   = value.type;

              var x;
              var y;

              if (Fukuran > 2000000 ) {
                $('#ukuran').html('<i class="fa fa-remove" style="color:red"> Ukuran file : '+ Math.round((value.size / 1024)) + ' KB , melebihi batas maximal 2000 KB </i>');
                  x = false;
              }else{
                $('#ukuran').html('<i class="fa fa-check"></i> Ukuran file : '+ Math.round((value.size / 1024)) + ' KB');
                x= true;
              }


              if (Ftype == 'application/pdf') {
                $('#type').html('<i class="fa fa-check"></i> Type File : '+Ftype);
                  y = true;
              }else{
                $('#type').html('<i class="fa fa-remove" style="color:red"> Type File : '+ Ftype+' ini Bukan file PDF</i> ');
                  y = false;
              }

              if (x && y) { $('.upload').attr('type','submit');$('.upload').removeClass('disabled');}else{$('.upload').attr('type','button');$('.upload').addClass('disabled');}

            })

        }

    });
  });

  $(function() {
    var cetak = $('.cetak').attr('href');

    $('.laporan').on('change', function(){
      var tgl = $(this).serialize();

      
      $('.cetak').attr('href' , cetak+tgl);
    });
  });
</script>
<!-- popup -->
<script src="<?= base_url() ?>/assets/bower_components/popup/jquery.popupwindow.js"></script>
<script src="<?= base_url() ?>/assets/bower_components/popup/customjquery.popupwindow.js"></script>
<!-- jquery datepicker -->
<script src="<?= base_url() ?>/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>/assets/jquery-ui-datepicker-id.js"></script>
<script>
  $(function() {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd",
      showButtonPanel: true,
      regional : "id"
    })
    $('#datepicker2').datepicker({
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd",
      showButtonPanel: true,
      regional : "id"
    })
  });
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url() ?>/assets/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function() {
    // datatables
    $('#data').DataTable({ "lengthMenu": [[-1, 25, 50, 100], ["Semua", 25, 50, 100]] })
  });
</script>
<!-- Select2 -->
<script src="<?= base_url() ?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    //Initialize Select2 Elements
    $(function() {

      $('.select2').select2()

    });
    
</script>

<!-- SlimScroll -->
<script src="<?= base_url() ?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/assets/dist/js/demo.js"></script>

<!-- excel export -->
<script src="<?= base_url() ?>/assets/excelexportjs.js"></script>

<script>
  $(function() {
  	  	
  	//excel export
  	var $btntoExcel = $('.btnToE');
    $btntoExcel.on('click', function () {
        $("#data").excelexportjs({
            containerid: "data", datatype: 'table'
        });

    });

  })
</script>

</body>
</html>