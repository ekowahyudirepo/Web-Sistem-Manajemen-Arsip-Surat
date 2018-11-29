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
              <h3 class="box-title"><i class="fa fa-user-plus"></i> Tambah Pengguna Baru</h3>
            </div>
           
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= base_url() ?>lain/addpengguna" method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Pengguna : </label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama" placeholder="entri..">
                    <b class="note"> * Wajib diisi</b>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Level Pengguna : </label>

                  <div class="col-sm-4">
                    <select class="form-control" name="level" placeholder="entri..">
                    	<option value=""></option>
                    	<option value="user1"> USER 1</option>
                    	<option value="user2"> USER 2</option>
                    </select>

                  <b class="note"> * Wajib diisi</b>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat Email : </label>

                  <div class="col-sm-4">
                    <div class="input-group date">
	                  <div class="input-group-addon">
	                    <i class="fa fa-envelope"></i>
	                  </div>
	                  <input type="email" class="form-control pull-right" name="email">
	                </div>
                  <b class="note"> * Wajib diisi</b>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?= base_url() ?>lain/pengguna" class="btn btn-primary"><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Batal</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </div>
    </section>
