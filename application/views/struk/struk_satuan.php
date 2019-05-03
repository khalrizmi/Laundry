<!DOCTYPE html>
<html>
<head>
	<title>Struck Laundry</title>
	<style>
		*{
			font-size: 14px;
		}
		.cover{
			width: 500px;
			/*border: 1px solid black;*/
			float: left;
			padding: 10px;
		}
		.company-left{
			width: 250px;
			float: left;
		}
		.company-right{
			width: 250px;
			float: left;
		}
		.pelanggan{
			margin-top: -7px;
		}
		.hp{
			margin-left: 100px;
		}
		.ttd{
			margin-top: 10px;
			width: 100%;
			float: left;
		}
		.ttd-kiri, .ttd-kanan{
			width: 250px;
			float: left;
		}
	</style>
<script type="text/javascript">
	window.print();
	window.onfocus=function(){ window.close();}
</script>
</head>
<body>
	
	<div class="cover">
		<h3 align="center" style="font-size:20px">VIVA Laundry Cafe</h3>
			<div class="company-left">
				<table cellspacing="5">
					<tr><td>Ruko Pasar Bersih J-8</td></tr>
					<tr><td>Sentul City-Bogor</td></tr>
					<tr><td>08787 4060 950</td></tr>
				</table>
			</div>
			<div class="company-right">
				<table cellspacing="5">
					<tr>
						<td>Nomor Bon</td>
						<td>:</td>
						<td><?php echo $data['no_bon'] ?></td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td><?php echo $data['tgl_masuk'] ?></td>
					</tr>
					<tr>
						<td>Operator</td>
						<td>:</td>
						<td><?php echo $data['operator'] ?></td>
					</tr>
				</table>
			</div>
			<div class="email"><font color="blue" style="font-size:20px">vivalaundry19@gmail.com</font></div>
			<div class="pelanggan">
				<p>Data Pelanggan : <b><?php echo $data['nama'] ?> <br>
					  <span class="hp"><?php echo $data['no_hp'] ?></span></b></p>
			</div>
			<div class="tabel_item">
				<table class="tabel" cellspacing="5">
					<tr>
						<td>Nama Barang</td>
						<td>Jumlah</td>
						<td>Satuan</td>
						<td>Harg Satuan</td>
						<td>Jumlah</td>
					</tr>
					<?php foreach($item as $row): ?>
					<tr>
						<td><?php echo $row->nama_item ?></td>
						<td align="center"><?php echo $row->qty ?></td>
						<td align="center"></td>
						<td align="center"><?php echo $row->harga_normal ?></td>
						<td align="center"><?php echo $row->total_harga ?></td>
					</tr>
					<?php endforeach; ?>
					<tr><td colspan="5"></td></tr>
					<tr>
						<td>Catatan:</td>
						<td></td>
						<td></td>
						<td>TOTAL BON:</td>
						<td>Rp.<?php echo $data['total_bon'] ?></td>
					</tr>
					<tr>
						<td rowspan="2" colspan="2"></td>
						<td></td>
						<td>Delivery:</td>
						<td>Rp.</td>
					</tr>
					<tr>
						<td></td>
						<td>Kembalian:</td>
						<td>Rp.</td>
					</tr>
				</table>
			</div>
			<div class="ttd">
				<div class="ttd-kiri">
					Disiapkan oleh :
					<h3 align="center"><?= $data['operator'] ?></h3>
					<br><hr width="70%">
				</div>
				<div class="ttd-kanan">
					Diterima Oleh :
					<h3 align="center"><?= $data['nama'] ?></h3>
					<br><hr width="70%"> <br>
					<p style="margin-top:-12px">tgl:</p>
				</div>
			</div>
			<div class="peringatan">
				Perlu Diingat
				<ol style="margin-top:0px">
					<li>Kami tidak bertanggung jawab susut/luntur/rusak karena sifat bahan</li>
					<li>Pengambilan harus disertakan Bon</li>
					<li>Bon ini hanya berlaku 1 x 24 jam</li>
				</ol>
			</div>
	</div>

</body>
</html>
