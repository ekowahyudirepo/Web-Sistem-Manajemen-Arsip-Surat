<!-- Main content -->
    <section class="content">
    <div class="callout callout-info">
	    <h4>Tip!</h4>
	    <p>Periksa isian dengan teliti sebelum menyimpan</p>
    </div>

    <div class="row">
    	<div class="col-md-12">
    	<?php echo $this->session->flashdata('alert'); ?>
          <!-- Horizontal Form -->
          <div class="box box-info">
         	<div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-plus"></i> Tambah Data</h3>
            </div>
           
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= base_url() ?>keluar/add" method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kepada : </label>

                  <div class="col-sm-4">
                    <select title="pilih salah satu" name="kepada" class="form-control select2" required="">
          					<?php foreach ($kontak->result() as $k) { ?>
          					<option value=""></option>
          					<option value="<?php echo $k->id_kontak; ?>" > <?php echo $k->kontak; ?> </option>
          					<?php } ?>
          					</select>
                    <b class="note">* Wajib diisi</b>
                  </div>
                  <a href="" style="margin-left : 20px;"><i class="fa fa-user-plus fa-2x"></i></a>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nomor Surat : </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nomor" id="inputPassword3" placeholder="entri..">
                    <b class="note">* Wajib diisi, jika tidak ada isi - </b>
                  </div>

                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Perihal : </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="perihal" id="inputPassword3" placeholder="entri.." >
                    <b class="note">* Wajib diisi</b>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Surat : </label>

                  <div class="col-sm-4">
                    <div class="input-group date">
	                  <div class="input-group-addon">
	                    <i class="fa fa-calendar"></i>
	                  </div>
	                  <input type="text" class="form-control pull-right" name="tgl_surat" id="datepicker" readonly="" required="" >
	                </div>
                  <b class="note">* Wajib diisi</b>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?= base_url() ?>keluar" class="btn btn-primary"><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Batal</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </div>
    </section>
