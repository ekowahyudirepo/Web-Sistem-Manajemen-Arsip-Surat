<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user"></i> Daftar Pengguna Sistem
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="callout callout-info">
	    <h4>Tip!</h4>
	    <p>Penentuan level pengguna mempengaruhi aktifitas yang dapat dilakukan , cermati sebelum menambahkan dan berikan level pengguna sesuai ketentuan berlaku di instansi anda</p>
    </div>
      <?php echo $this->session->flashdata('alert'); ?>

      <!-- Tabel -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?= base_url()  ?>lain/tambahpengguna" class="btn btn-primary" data-toggle="tooltip" title="klik untuk menambah akun pengguna baru"><i class="fa fa-user-plus"></i> Tambah Pengguna</a>
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
        					<th>USERNAME</th>
        					<th>PASSWORD</th>
        					<th>EMAIL</th>
        					<th>PILIHAN</th>
        				</tr>
                </thead>
                <tbody>
                <?php $no = 0 ; foreach($peng->result() as $d) { $no++;?>
          					<tr>

          						<td><?php echo $no; ?></td>

          						<td><?php echo $d->nama_lengkap; ?></td>

          						<td><?php echo $d->level_user; ?></td>

          						<td><?php echo $d->username; ?></td>

          						<td> ****PASSWORD**** </td>

          						<td><?php echo $d->email; ?></td>

          						<td>
                        <?php if( $d->level_user != 'superuser' ){ ?>
                        <a href="<?= base_url() ?>hapuspengguna/<?= $d->id_user ?>" class="delete btn btn-danger"><i class="fa fa-trash"></i></a>
                        <?php } ?>
                      </td>


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
