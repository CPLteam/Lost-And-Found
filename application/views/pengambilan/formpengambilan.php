<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<form action="<?= base_url() . 'pengambilan/add_action'; ?>" method="post">
				<div class="form-group">
					<label for="no_laporan">No Laporan</label>
					<input type="text" class="form-control" name="no_laporan" id="no_laporan" value="<?= set_value('no_laporan'); ?>">
				</div>
				<div class="form-group">
					<label for="nama_pengambil">Nama Pengambil</label>
					<input type="text" class="form-control" name="nama_pengambil" id="nama_pengambil" value="<?= set_value('nama_pengambil'); ?>">
				</div>
				<div class="form-group">
					<label for="no_handphone">No Handphone</label>
					<input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= set_value('no_hp'); ?>">
				</div>
				<div class="form-group">
					<label for="tgl_pengambilan">Tanggal Pengambilan</label>
					<input type="text" class="form-control" name="tgl_pengambilan" id="tgl_pengambilan" value="<?= set_value('tgl_pengambilan');?>">
				</div>
				<button type="submit" class="btn btn-primary float-right">
					Submit
				</button>
			</form>
		</div>
	</div>
</div>
</div>