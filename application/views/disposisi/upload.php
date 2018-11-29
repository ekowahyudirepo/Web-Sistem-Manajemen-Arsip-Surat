<!-- Main content -->
    <section class="content">
    <div class="callout callout-info">
	    <h4>Tip!</h4>
	    <p>Periksa isian dengan teliti sebelum menyimpan</p>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
         	<div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-file-pdf-o"></i> Upload File</h3>
            </div>
           
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?= base_url().'disposisi/up' ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-1 control-label">File</label>

                  <div class="col-sm-4">
                  	<input type="hidden" class="form-control" name="id" value="<?= $this->uri->segment(3) ?>">
                    <input id="file" type="file" class="form-control" name="file" accept="image/x-eps,application/pdf" required="">
                    <b class="note"> * Wajib diisi</b>
                    <br>
                    <p id="type"></p>
					          <p id="ukuran"></p>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?= base_url() ?>disposisi" class="btn btn-primary" ><i class="fa fa-reply"></i> Kembali</a>
                <button id="upload" type="submit" class="btn btn-info"><i class="fa fa-save"></i> Upload</button>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i> Batal</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </div>
    </section>
