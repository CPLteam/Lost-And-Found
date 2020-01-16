<script type="text/javascript" src="<?php echo base_url('assets/vendor/jquery/jquery-3.4.1.js') ?>"></script>
<script type="text/javascript">
	$('#exampleModal').on('show.bs.modal', event => {
		var button = $(event.relatedTarget);
		var modal = $(this);
		// Use above variables to manipulate the DOM

	});
</script>

<!-- Tambah Pengambilan Modal-->
<div class="modal fade" id="modelPengambilan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Form Pengambilan</h5>
			</div>
			<div class="modal-body">
				<?= form_open_multipart('pengambilan/add_action'); ?>
				<div class="form-group">
					<label for="no_laporan">No Laporan</label>
					<select class="form-control" name="no_laporan" id="no_laporan" required>
						<?php
						$sql = $this->db->get('temuan');
						foreach ($sql->result() as $row) : ?>
							<option><?php if ($row->status == 0) {
										echo $row->no_laporan;
									} ?></option>
						<?php endforeach; ?>
					</select>
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
					<label for="no_handphone">Foto Pengambil</label>
					<input type="file" class="form-control" name="foto_pengambil" id="foto_pengambil" value="<?= set_value('foto_pengambil'); ?>">
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_ambil" value="<?= set_value('id_ambil'); ?>">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
				<?= form_close(); ?>
			</div>

		</div>
	</div>
</div>