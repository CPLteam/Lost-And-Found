<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<?= form_open_multipart('pengambilan/add_action'); ?>
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
				<label for="no_handphone">No Handphone</label>
				<input type="file" class="form-control" name="foto_pengambil" id="foto_pengambil" value="<?= set_value('foto_pengambil'); ?>">
			</div>
			<button type="submit" class="btn btn-primary float-right">
				Submit
			</button>
			<?= form_close(); ?>
		</div>
	</div>
</div>
</div>