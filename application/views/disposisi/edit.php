<!-- Main content -->
    <section class="content">
    <div class="callout callout-info">
	    <h4>Tip!</h4>
	    <p>Periksa isian dengan teliti sebelum menyimpan</p>
    </div>
    <div id="alert"></div>

    <div class="row">
    	<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
         	<div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-edit"></i> Edit Disposisi</h3>
            </div>
           
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= base_url() ?>disposisi/update/<?= $this->uri->segment(3) ?>" method="POST" class="form-horizontal">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nomor Disposisi : </label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nomor" value="<?= $this->uri->segment(3) ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Isi Disposisi : </label>

                  <div class="col-sm-8">
                    <textarea class="form-control" name="perihal"></textarea>
                    <b class="note"> * Wajib diisi</b>
                  </div>
                </div>
                

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?= base_url() ?>disposisi" class="btn btn-primary" ><i class="fa fa-reply"></i> Kembali</a>
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Batal</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </div>
    </section>
