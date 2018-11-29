<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-star-o"></i> Daftar Riwayat Pengguna Sistem
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="callout callout-info">
	    <h4>Tip!</h4>
	    <p>Tabel dibawah menyimpan semua aktifitas pengguna, teliti dan cermati sebelum mengosongkan Riwayat</p>
    </div>
      <?php echo $this->session->flashdata('alert'); ?>

      <!-- Tabel -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?= base_url()  ?>lain/kosongkanriwayat" class="delete btn btn-primary" data-toggle="tooltip" title="klik untuk mengosongkan riwayat"><i class="fa fa-trash"></i> Kosongkan Riwayat</a>
              <button type="button" class="btnToE btn btn-primary" data-toggle="tooltip" title="klik untuk memulai export"><i class="fa fa-file-excel-o"></i> Export Excel</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr>
        					<th>NO</th>
        					<th>NAMA PENGGUNA</th>
        					<th>LEVEL</th>
        					<th>IP</th>
        					<th>AKTIVITAS</th>
        					<th>WAKTU</th>
        				</tr>
                </thead>
                <tbody>
                <?php $no = 0 ; foreach($riw->result() as $d) { $no++;?>
					<tr>

						<td><?php echo $no; ?></td>

						<td><?php echo $d->nama_lengkap; ?></td>

						<td><?php echo $d->level_user; ?></td>

						<td><?php echo $d->ip; ?></td>

						<td><?php echo $d->log; ?></td>

						<td><?php echo date('d-M-Y H:i:s',strtotime($d->tgl_riwayat)) ?></td>


					</tr>

				<?php } ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
