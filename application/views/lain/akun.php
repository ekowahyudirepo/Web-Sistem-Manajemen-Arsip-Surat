<?php foreach ($akun->result() as $d) ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-user"></i> Akun Saya
  </h1>
</section>
<!-- Main content -->
    <section class="content">
    <div class="callout callout-info">
	    <h4>Tip!</h4>
	    <p>Periksa isian dengan teliti sebelum menyimpan</p>
    </div>
    <div class="row">
		<div class="col-md-12">
			<?php echo $this->session->flashdata('alert'); ?>
		</div>
	</div>
    <div class="row">
    	
    	<div class="col-md-6">
    	
          <!-- Horizontal Form -->
          <div class="box box-info" style="min-height:230px">
         	<div class="box-header with-border">
              <h3 class="box-title">Username dan Password Saya</h3>
            </div>
           
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= base_url() ?>lain/kirimakunbaru" method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Nama User : </label>

                  <div class="col-sm-9">
                    <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
                    <input type="hidden" name="email" value="<?= $d->email; ?>" required>
                    <input type="text" class="form-control pull-right" name="nama" value="<?= $d->nama_lengkap; ?>" required>
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Username : </label>

                  <div class="col-sm-9">
                    <div class="input-group date">
	                  <div class="input-group-addon">
	                    <i class="fa fa-user"></i>
	                  </div>
	                  <input type="text" class="form-control pull-right" name="username" value="<?= $d->username; ?>" required>
	                </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Password : </label>

                  <div class="col-sm-9">
                    <div class="input-group date">
	                  <div class="input-group-addon">
	                    <i class="fa fa-lock"></i>
	                  </div>
	                  <input type="password" class="form-control pull-right" name="password" value="<?= $d->password; ?>" required>
	                </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Perbarui</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Batal</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

        <div class="col-md-6">
    	
          <!-- Horizontal Form -->
          <div class="box box-info" style="min-height:230px">
         	<div class="box-header with-border">
              <h3 class="box-title">Email Saya</h3>
            </div>
           
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= base_url() ?>lain/kirimemailbaru" method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Email : </label>

                  <div class="col-sm-10">
                    <div class="input-group date">
	                  <div class="input-group-addon">
	                    <i class="fa fa-envelope"></i>
	                  </div>
	                  <input type="email" class="form-control pull-right" name="email" value="<?= $d->email; ?>" required>
	                </div>
	                <br>
	                <div class="alert alert-info">
                  		<strong> Email terdaftar digunakan sebagai media konfirmasi </strong> 
                  	</div>
                  </div>

                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Perbarui</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Batal</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </div>
    </section>
