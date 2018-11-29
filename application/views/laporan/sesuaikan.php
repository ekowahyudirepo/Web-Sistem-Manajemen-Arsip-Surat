
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-print"></i> Sesuaikan Laporan
  </h1>
</section>

<section class="content">
	  <div class="callout callout-info">
	    <h4>Tip!</h4>
	    <p>Periksa isian dengan teliti sebelum mencetak laporan</p>
    </div>
      <!-- Pencarian Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-search"></i> Tanggal Pencarian </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="sembunyi / perlikatkan">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="laporan">
            <div class="row">
            <div class="col-md-4">
              <!-- Date -->
              <div class="form-group">
                <label>Arsip :</label>

                  <select class="form-control" name="a">
                    <option value="masuk"> Masuk</option>
                    <option value="keluar"> Keluar </option>
                    <option value="disposisi"> Disposisi </option>
                  </select>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <div class="col-md-4">
              <!-- Date -->
              <div class="form-group">
                <label>Mulai :</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>

                  <input type="text" class="tgl1 form-control pull-right" name="m" id="datepicker" readonly="" required="" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <div class="col-md-4">
              <!-- Date -->
              <div class="form-group">
                <label>Sampai :</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="tgl2 form-control pull-right" name="s" id="datepicker2" readonly="" required="" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>

            
          </div>
          <input type="hidden" name="token" value="<?= md5(date('Y-m-d H:i:s')) ?>">
          <!-- /.row -->
          </form>
          <a href="<?= base_url()  ?>laporan/cetak/?" class="cetak popupwindow btn btn-primary" rel="windowCenter" data-toggle="tooltip" title="klik untuk cetak laporan"><i class="fa fa-print"></i> Cetak</a>
        </div>
      </div>
      <!-- /.box -->


</section>



 