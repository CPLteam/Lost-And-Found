<script type="text/javascript" src="<?php echo base_url('assets/vendor/jquery/jquery-3.4.1.js') ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#barang').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url('penemuan/get_namaBarang') ?>",
				method: "POST",
				data: {
					id_barang: id,
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value=' + data[i].id_detail_barang + '>' + data[i].nama_barang + '</option>';
					}
					$('#detail_barang').html(html);
				}
			});
		});

		// $('#detail_barang').change(function(){
		//     var id_detail_barang = $('#detail_barang').val();
		//     if (id_detail_barang != ''){

		//     }
	});
	$('#exampleModal').on('show.bs.modal', event => {
		var button = $(event.relatedTarget);
		var modal = $(this);
		// Use above variables to manipulate the DOM

	});
</script>

<!-- Tambah Temuan Modal-->
<div class="modal fade" id="modelTemuan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Penemuan</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open_multipart('penemuan/add_action'); ?>

				<div class="form-group">
					<label for="no_laporan">No. Laporan</label>
					<input readonly name="no_laporan" id="no_laporan" class="form-control" value="<?= $this->No_urut->buat_no_laporan() ?>">
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input readonly name="id_user" id="id_user" class="form-control" value="<?= $user['id_user'] ?>">
				</div>

				<div class="form-group">
					<label for="tgl_temuan">Tanggal Ditemukan</label>
					<input type="date" name="tgl_temuan" id="tgl_temuan" class="form-control" value="<?= set_value('tgl_temuan'); ?>">
				</div>

				<div class="form-group">
					<label for="jenis_barang">Jenis Barang Yang Ditemukan</label>
					<select name="id_barang" id="barang" class="form-control">
						<option value="0">-SELECT-</option>
						<?php
						foreach ($detail_barang->result() as $row) : ?>
							<option value="<?php echo $row->id_barang; ?>"><?php echo $row->jenis_barang; ?></option>
						<?php endforeach;
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="nama_barang">Nama Barang Yang Ditemukan</label>
					<select name="id_detail_barang" id="detail_barang" class="form-control">
						<option value="0">-SELECT-</option>
					</select>
				</div>

				<div class="form-group">
					<label for="deskripsi">Deskripsi Barang Yang Ditemukan</label>
					<input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Contoh : Handphone Merek Samsung Warna Biru" value="<?= set_value('deskripsi'); ?>">
				</div>

				<div class="form-group">
					<label for="lokasi_penemuan">Lokasi Penemuan</label>
					<select name="id_lokasi" class="form-control">
						<?php
						$sql = $this->db->get('lokasi');
						foreach ($sql->result() as $row) {
						?>
							<option value="<?= $row->id_lokasi ?>"><?= $row->gedung ?> - <?= $row->lantai ?></option>

						<?php
						}
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="lokasi_penemuan">Deskripsi Lokasi Penemuan</label>
					<input type="text" name="lokasi_penemuan" id="lokasi_penemuan" class="form-control" placeholder="Contoh : Diatas Meja / Didalam Ruangan 615 / Di toilet" value="<?= set_value('lokasi_penemuan'); ?>">
				</div>

				<div class="form-group">
					<label for="foto_barang">Foto Barang Yang Ditemukan</label>
					<input type="file" name="foto_barang" id="foto_barang" class="form-control" value="<?= set_value('foto_barang'); ?>">
				</div>

				<div class="modal-footer">
					<input type="hidden" name="id_temuan" value="<?= set_value('id_temuan'); ?>">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>

				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>