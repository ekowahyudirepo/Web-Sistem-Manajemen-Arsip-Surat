<?php 

	foreach ($lem->result() as $d)

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>

<body style="font : 12px/21px arial;">
<h1 style="text-align: center;font-weight:bold;margin-bottom:5px">LEMBAR DISPOSISI</h1>
<div style="margin:auto;width: 550px; border-left: 2px solid black;border-right: 2px solid black;border-bottom: 2px solid black;border-top: 2px solid black;">
	<div style="width: 100%;margin-top:10px;">
		<table style="float: left;margin-left:10px;">
			<tr>
				<td style="padding-right:10px;">Index</td>
				<td style="padding-right:10px;"> : </td>
			</tr>
			<tr>
				<td style="padding-right:10px;">Berkas</td>
				<td style="padding-right:10px;"> : </td>
			</tr>
		</table>

		<table style="float: right;padding-right: 70px;">
			<tr>
				<td style="padding-right:10px;">Kode</td>
				<td style="padding-right:10px;"> : <?= $d->nodis ?> </td>
			</tr>
		</table>
		<div style="clear: both;"></div>
	</div>

	<div style="width: 100%;border-top: 1px solid black;">
		<table style=";margin-left:10px;">
			<tr>
				<td style="padding-right:10px;width:100px">Tanggal / Nomor</td>
				<td style="padding-right:10px;"> : </td>
				<td> <?= $d->tgl_surat_masuk ?> / <?= $d->nomor_surat_masuk ?></td>
			</tr>
			<tr>
				<td style="padding-right:10px;">Asal</td>
				<td style="padding-right:10px;"> : </td>
				<td> <?= $d->kontak ?></td>
			</tr>
			<tr>
				<td style="padding-right:10px;">Isi ringkasan</td>
				<td style="padding-right:10px;"> : </td>
				<td> <?= $d->perihal_surat_masuk ?></td>
			</tr>
			<tr>
				<td style="padding-right:10px;">Diterima tanggal</td>
				<td style="padding-right:10px;"> : </td>
				<td> <?= $d->tgl_diterima_surat_masuk ?></td>
			</tr>
		</table>
	</div>
	<div style="width: 100%;border-top: 1px solid black">
		<table style="margin-left:10px;">
			<tr>
				<td style="padding-right:10px;">Tanggal penyelesaian </td>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div>

	<div style="width: 100%;border-top: 1px solid black">
		<div style="float: left;padding-left: 15px;">
			  Isi disposisi : 
			  <br>
		
		</div>
		<div style="width: 50%;float: right;border-left: 1px solid black;padding-left: 10px;"> 
				Diteruskan kepada :
				<br>
				1.
				<br>
				2.
				<br>
				3.
				<br>
        		<br>
        		<br>
        		<br>
        		<br>
        		<br>
        		<br>
        		<br>
        		<br>
        		<br>
        		<br>
		</div>
		

		<div style="clear: both;"></div>
	</div>
	<div style="width: 100%;border-top: 1px solid black">
		<p style="text-align: center;"> Sesudah digunakan harap segera dikembalikan :</p>
		<table style="margin-left:10px;margin-bottom:10px;">
			<tr>
				<td style="padding-right:10px;">Kepada</td>
				<td style="padding-right:10px;"> : </td>
				<td> .......................................................................................................</td>
			</tr>
			<tr>
				<td style="padding-right:10px;">Tanggal</td>
				<td style="padding-right:10px;"> : </td>
				<td> .......................................................................................................</td>
			</tr>
		</table>
	</div>

</div>
<script> window.print() </script>
</body>
</html>
