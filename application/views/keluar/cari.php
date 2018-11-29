<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-envelope-o"></i> Surat Keluar
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Pencarian Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-search"></i> Pencarian</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="sembunyi / perlikatkan">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="<?= base_url() ?>keluar/cari" method="GET">
            <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Dari</label>
                <select class="form-control select2" name="i" style="width: 100%;">
                  <option value=""> Semua </option>
        					<?php foreach ($kontak->result() as $k) { ?>
        					<option value="<?php echo $k->id_kontak; ?>" <?php if($_GET['i'] == $k->id_kontak){ echo 'selected'; } ?> > <?php echo $k->kontak; ?> </option>
        					<?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Urut Berdasarkan</label>
                <select class="form-control" name="k" style="width: 100%;">
                	<option value="1" <?php if($_GET['k'] == 1 ){ echo 'selected'; } ?> >Tanggal Surat</option>
					        <option value="2" <?php if($_GET['k'] == 2 ){ echo 'selected'; } ?> >Tanggal Arsip</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <!-- Date -->
              <div class="form-group">
                <label>Mulai :</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="m" id="datepicker" value="<?= $_GET['m'] ?>" readonly="" required="" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <div class="col-md-3">
              <!-- Date -->
              <div class="form-group">
                <label>Sampai :</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="s" id="datepicker2" value="<?= $_GET['s'] ?>" readonly="" required="" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
          </div>
          <!-- /.row -->
            <button type="submit" class="btn btn-success" data-toggle="tooltip" title="klik untuk lanjut pencarian"><i class="fa fa-search"></i> Cari</button>
          </form>
          
        </div>
      </div>
      <!-- /.box -->


      <!-- Tabel -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="<?= base_url() ?>keluar/tambah" class="btn btn-primary" data-toggle="tooltip" title="klik untuk tambah data baru"><i class="fa fa-plus"></i> Tambah Data</a>
              <button id="#btnToE" type="button" class="btn btn-primary" data-toggle="tooltip" title="klik untuk memulai export"><i class="fa fa-file-excel-o"></i> Export Excel</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr>
          					<th>NO</th>
          					<th>FILE</th>
          					<th>NOMOR SURAT</th>
          					<th>PERIHAL</th>
          					<th>KEPADA</th>
          					<th>TANGGAL SURAT</th>
          					<th>TANGGAL ARSIP</th>
          					<th>PILIHAN</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 0 ; foreach($csk->result() as $d) { $no++;?>
        					<tr>
        						<td><?php echo $no; ?></td>
        						<td>
        							<?php if( empty($d->upload_surat_keluar) ){  ?>
        								<a href="<?= base_url() ?>keluar/upload/<?= $d->id_surat_keluar ?>" data-toggle="tooltip" title="Klik untuk memulai mengunggah scan surat" class="btn btn-primary" ><i class="fa fa-plus"></i></a>
        							<?php }else{ ?>

        								<a data-toggle="tooltip" title="Klik untuk melihat surat" href="<?= base_url() ?>arsip_keluar/<?= $d->upload_surat_keluar ?>" class="btn btn-primary popupwindow" rel="windowCenter" ><i class="fa fa-file-pdf-o"></i></a>
        								<a data-toggle="tooltip" class="pull-right btn btn-danger" onclick="return confirm('Yakin ?')" href="keluar/hapusfile/<?= $d->id_surat_keluar ?>/<?= $d->upload_surat_keluar ?>" title="Klik untuk menghapus file arsip" ><i class="fa fa-trash-o"></i></a>

        							<?php } ?>
        						</td>
        						<td>
        							<?php echo $d->nomor_surat_keluar; ?> 
        						</td>	
        						
        						<td><?php echo $d->perihal_surat_keluar; ?></td>
        						<td><?php echo $d->kontak; ?></td>
        						<td><?php echo date('d-M-Y',strtotime($d->tgl_surat_keluar)); ?></td>
        						<td><?php echo date('d-M-Y',strtotime($d->tgl_arsip_surat_keluar)); ?></td>
        						
        						<td>
        							<a href="<?= base_url() ?>keluar/edit/<?= $d->id_surat_keluar ?>" data-toggle="tooltip" title="Klik untuk memulai edit data" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>

        							<a class="delete pull-right btn btn-danger" href="<?= base_url() ?>keluar/hapus/<?= $d->id_surat_keluar ?>/<?= $d->upload_surat_keluar ?>" data-toggle="tooltip" title="Klik untuk menghapus data arsip" ><i class="fa fa-trash-o"></i></a>
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
