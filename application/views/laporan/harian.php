
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-print"></i> Laporan Harian
  </h1>
</section>


<section class="content">
	<div class="callout callout-info">
	    <h4>Tip!</h4>
	    <p>Periksa isian dengan teliti sebelum mencetak laporan</p>
    </div>
    
	<h3><i class="fa fa-envelope-o"></i> Surat Masuk  <a href="<?= base_url() ?>laporan/harian/masuk" class="popupwindow pull-right btn btn-primary" rel="windowCenter" ><i class="fa fa-print"></i> Cetak</a></h3> 
	<div class="box">
		<div class="box-body">
		    <table class="table table-bordered table-striped" style="font-size: 12px;">

				<tr>

					<th>NO</th>

					<th>NOMOR SURAT</th>

					<th>PERIHAL</th>

					<th>DARI</th>

				</tr>

				<?php $no = 0 ; foreach($sm->result() as $d) { $no++;?>
						<tr>
							<td><?php echo $no; ?></td>
							
							<td>
								<?php echo $d->nomor_surat_masuk; ?> 
							</td>	
							
							<td><?php echo $d->perihal_surat_masuk; ?></td>
							<td><?php echo $d->kontak; ?></td>
							
						</tr>

				<?php } ?>

			</table>
		</div>
	</div>
	
	
	<h3><i class="fa fa-envelope-open-o"></i> Surat Keluar  <a href="<?= base_url() ?>laporan/harian/keluar" class="popupwindow pull-right btn btn-primary" rel="windowCenter" ><i class="fa fa-print"></i> Cetak </a></h3>
	<div class="box">
		<div class="box-body">
		    <table class="table table-bordered table-striped" style="font-size: 12px;">

				<tr>

					<th>NO</th>

					<th>NOMOR SURAT</th>

					<th>PERIHAL</th>

					<th>DARI</th>

				</tr>

				<?php $no = 0 ; foreach($sk->result() as $d) { $no++;?>
						<tr>
							<td><?php echo $no; ?></td>
							
							<td>
								<?php echo $d->nomor_surat_keluar; ?> 
							</td>	
							
							<td><?php echo $d->perihal_surat_keluar; ?></td>
							<td><?php echo $d->kontak; ?></td>
							
						</tr>

				<?php } ?>

			</table>
		</div>
	</div> 
    

	
	<h3><i class="fa fa-exchange"></i> Disposisi  <a href="<?= base_url() ?>laporan/harian/disposisi" class="popupwindow pull-right btn btn-primary" rel="windowCenter" ><i class="fa fa-print"></i> Cetak </a></h3> 
	<div class="box">
		<div class="box-body">
		    <table class="table table-bordered table-striped" style="font-size: 12px;">

				<tr>

					<th>NO</th>

					<th>NOMOR DISPOSISI</th>

					<th>PERIHAL DISPOSISI</th>

					<th>KEPADA</th>

					<th>PERIHAL SURAT MASUK</th>

					<th>DARI</th>

				</tr>

				<?php $no = 0 ; foreach($dis->result() as $d) { $no++;?>
						<tr>
							<td><?php echo $no; ?></td>
							
							<td><?php echo $d->nomor_disposisi; ?></td>	

							<td><?php echo $d->perihal_disposisi; ?></td>	
							
							<td><?php echo $d->kontak2; ?></td>

							<td><?php echo $d->perihal_surat_masuk; ?></td>	

							<td><?php echo $d->kontak; ?></td>
							
						</tr>

				<?php } ?>

			</table>
		</div>
	</div>

</section>