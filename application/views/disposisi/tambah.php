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
              <h3 class="box-title"><i class="fa fa-plus"></i> Tambah Disposisi</h3>
            </div>
           
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= base_url() ?>masuk/addDisposisi" method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nomor Disposisi : </label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nomor" placeholder="entri.." required="">
                    <b class="note"> * Wajib diisi</b>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Asal Surat : </label>

                  <div class="col-sm-10">
                  	<input type="hidden" class="form-control" name="asal" value="<?= $this->uri->segment(3) ?>">
                    <input type="text" class="form-control" value="<?= $this->uri->segment(4) ?>" readonly="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Terima : </label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="tgl_terima" value="<?= $this->uri->segment(5) ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kepada : </label>

                  <div class="col-sm-4">
                    <select title="pilih salah satu" name="kepada" class="form-control select2" required="">
                    <option value=""></option>
          					<?php foreach ($kontak2->result() as $k) { ?>
          					<option value="<?php echo $k->id_kontak2; ?>" > <?php echo $k->kontak2; ?> </option>
          					<?php } ?>
          					</select>
                    <b class="note"> * Wajib diisi</b>
                  </div>
                  <a href="<?= base_url() ?>kontak_dalam" style="margin-left:20px;"><i class="fa fa-user-plus fa-2x"></i></a>

                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?= base_url() ?>masuk" class="btn btn-primary" ><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Batal</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </div>
    </section>
