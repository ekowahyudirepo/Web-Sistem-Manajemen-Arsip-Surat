<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-id-card"></i> Daftar Kontak Dalam
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-md-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $this->kontak2->totalDisposisiBagian()->num_rows() ?></h3>

              <p>Disposisi</p>
            </div>
            <div class="icon">
              <i class="fa fa-exchange"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
    </div>

      <?php echo $this->session->flashdata('alert'); ?>

      <!-- Tabel -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="kontak_dalam/tambah" class="btn btn-primary" data-toggle="tooltip" title="klik untuk tambah data baru"><i class="fa fa-plus"></i> Tambah Kontak</a>
              <button type="button" class="btn btn-primary" data-toggle="tooltip" title="klik untuk memulai export"><i class="fa fa-file-excel-o"></i> Export Excel</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr>
        					<th>NO</th>
        					<th>NAMA KONTAK</th>
        					<th>DISPOSISI</th>
        					<th>PILIHAN</th>
			
                </tr>
                </thead>
                <tbody>
                <?php $no = 0 ; foreach($kontak2->result() as $d) { $no++;?>
        					<tr>

        						<td><?php echo $no; ?></td>

        						<td><?php echo $d->kontak2; ?></td>

        						<td><?php echo $this->kontak2->totalDisposisiBagian( $d->id_kontak2 )->num_rows() ?></td>

        						<td>

        							<a title="Klik untuk memulai edit kontak" href="kontak_dalam/edit/<?= $d->id_kontak2 ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>

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
