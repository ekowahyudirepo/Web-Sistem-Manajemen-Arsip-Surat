<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-envelope-o"></i> Surat Masuk
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $this->session->flashdata('alert'); ?>
      <!-- Pencarian Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-search"></i> Pencarian</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" title="sembunyi / perlikatkan">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form action="<?= base_url() ?>masuk/cari" method="post">
            <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Dari</label>
                <select class="form-control select2" name="i" style="width: 100%;">
                  <option value=""> Semua </option>
        					<?php foreach ($kontak->result() as $k) { ?>
        					<option value="<?= $k->id_kontak; ?>" > <?= $k->kontak; ?> </option>
        					<?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Urut Berdasarkan</label>
                <select class="form-control" name="k" style="width: 100%;">
                	<option value="1" >Tanggal Surat</option>
					        <option value="2" selected >Tanggal Arsip</option>
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
                  <input type="text" class="form-control pull-right" name="m" id="datepicker" readonly="" required="">
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
                  <input type="text" class="form-control pull-right" name="s" id="datepicker2" readonly="" required="">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
          </div>
          <!-- /.row -->
            <button type="submit" class="btn btn-success" title="klik untuk lanjut pencarian"><i class="fa fa-search"></i> Cari</button>
          </form>
          
        </div>
      </div>
      <!-- /.box -->


      <!-- Tabel -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="masuk/tambah" class="btn btn-primary" title="klik untuk tambah data baru"><i class="fa fa-plus"></i> Tambah Arsip</a>
              <button type="button" class="btnToE btn btn-primary" title="klik untuk memulai export"><i class="fa fa-file-excel-o"></i> Export Excel</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr>
        					<th>NO</th>
        					<th>DISPOSISI</th>
        					<th>NOMOR DISPOSISI</th>
        					<th>FILE</th>
        					<th>NOMOR SURAT</th>
        					<th>PERIHAL</th>
        					<th>DARI</th>
        					<th>TANGGAL SURAT</th>
        					<th>TANGGAL DITERIMA</th>
        					<th>TANGGAL ARSIP</th>
        					<th>PILIHAN</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 0 ; foreach($sm->result() as $d) { $no++;?>
        					<tr>
        						<td><?php echo $no; ?></td>
        						<td>
        						<?php if(!empty($d->upload_surat_masuk) && empty($d->filedis) && empty($d->iddis) ) {?>
        							<a href="masuk/disposisi/<?= $d->id_surat_masuk ?>/<?= $d->kontak ?>/<?= $d->tgl_diterima_surat_masuk ?>" title="Klik untuk memulai disposisi" class="btn btn-primary" ><i class="fa fa-plus"></i></a>
        						<?php }elseif ( !empty($d->iddis) && empty($d->filedis) ) { ?>
        							<a title="Terdapat data disposisi, file disposisi kosong" class="btn btn-warning" ><i class="fa fa-check"></i></a>
        							<a href="masuk/lembar_disposisi/<?= $d->id_surat_masuk ?>" title="Cetak lembar disposisi" class="btn btn-primary popupwindow" rel="windowCenter" ><i class="fa fa-print"></i></a>
        						<?php }elseif (empty($d->upload_surat_masuk)) { ?>
        							
        						<?php }else{ ?>
        							<a title="Klik untuk melihat file disposisi" class="popupwindow btn btn-primary" rel="windowCenter" href="<?= base_url() ?>arsip_disposisi/<?php echo $d->filedis; ?>" ><i class="fa fa-file-pdf-o"></i></a>

        						<?php } ?>
        						</td>
        						<td><?= $d->nodis ?></td>
        						<td>
        							<?php if( empty($d->upload_surat_masuk) ){  ?>
        								<a href="<?= base_url() ?>masuk/upload/<?= $d->id_surat_masuk ?>" title="Klik untuk memulai mengunggah scan surat" class="btn btn-primary" ><i class="fa fa-plus"></i></a>
        							<?php }else{ ?>

        								<a title="Klik untuk melihat surat" href="<?= base_url() ?>arsip_masuk/<?= $d->upload_surat_masuk ?>" class="btn btn-primary popupwindow" rel="windowCenter" ><i class="fa fa-file-pdf-o"></i></a>
        								<a class="delete pull-right btn btn-danger" href="<?= base_url() ?>masuk/hapusfile/<?= $d->id_surat_masuk ?>/<?= $d->upload_surat_masuk ?>" title="Klik untuk menghapus file arsip" ><i class="fa fa-trash-o"></i></a>

        							<?php } ?>
        						</td>
        						<td>
        							<?php echo $d->nomor_surat_masuk; ?> 
        						</td>	
        						
        						<td><?php echo $d->perihal_surat_masuk; ?></td>
        						<td><?php echo $d->kontak; ?></td>
        						<td><?php echo date('d-M-Y',strtotime($d->tgl_surat_masuk)); ?></td>
        						<td><?php echo date('d-M-Y',strtotime($d->tgl_diterima_surat_masuk)); ?></td>
        						<td><?php echo date('d-M-Y',strtotime($d->tgl_arsip_surat_masuk)); ?></td>
        						
        						<td>
        							<a href="<?= base_url() ?>masuk/edit/<?= $d->id_surat_masuk ?>" title="Klik untuk memulai edit data" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>

        							<a class="delete pull-right btn btn-danger" href="<?= base_url() ?>masuk/hapus/<?= $d->id_surat_masuk ?>/<?= $d->upload_surat_masuk ?>" title="Klik untuk menghapus data arsip" ><i class="fa fa-trash-o"></i></a>
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
