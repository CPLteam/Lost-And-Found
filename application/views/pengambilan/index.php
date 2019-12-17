<div class="row mt-4">
	<div class="col-xl-12 col-lg-12">
		<h1>List Temuan Barang</h1>
		<form action="<?php echo base_url() . 'pengambilan/add_action'; ?>" method="post">
			<table style="margin:20px auto;">
				<tr>
					<td>No Laporan</td>
					<td><input type="text" name="no_laporan" id="no_laporan" value="<?= set_value('no_laporan'); ?>"></td>
				</tr>
				<tr>
					<td>Nama Pengambil</td>
					<td><input type="text" name="nama_pengambil" id="nama_pengambil" value="<?= set_value('nama_pengambil'); ?>"></td>
				</tr>
				<tr>
					<td>No Handphone</td>
					<td><input type="text" name="no_hp" id="no_hp" value="<?= set_value('no_hp'); ?>"></td>
				</tr>
				<td></td>
				<td><button type="submit" href="<?= site_url('pengambilan/index'); ?>">Submit</button></td>
				</tr>
			</table>
		</form>
	</div>
</div>
</div>