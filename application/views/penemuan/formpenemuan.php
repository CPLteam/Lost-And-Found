<style type="text/css">
	.penemuan {
		margin: 10px auto;
		width: 900px;
		padding: 5px;
		/* border: 1px solid #ccc; */
		/* background: white; */
	}
</style>

<center>
	<h1>Form Penemuan</h1>
</center>


<div class="penemuan">
	<h1>&nbsp;</h1>

	<?= form_open_multipart('penemuan/add_action'); ?>
	<table cellspacing="2" cellpadding="2">
		<div class="form-group">
			<label for="no_laporan">No. Laporan</label>
			<input readonly name="no_laporan" id="no_laporan" class="form-control" value="<?= $this->No_urut->buat_no_laporan() ?>">
		</div>
		<div class="form-group">
			<label for="jenis_barang">Jenis Barang <?= form_error('id_barang') ?></label>
			<select name="id_barang" class="form-control">
				<?php
				$sql = $this->db->get('barang');
				foreach ($sql->result() as $row) {
				?>
					<option value="<?= $row->id_barang ?>"><?= $row->jenis_barang ?></option>

				<?php
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="nama_barang">Nama Barang <?= form_error('id_detail_barang') ?></label>
			<select name="id_detail_barang" class="form-control">
				<?php
				$sql = $this->db->get('detail_barang');
				foreach ($sql->result() as $row) {
				?>
					<option value="<?= $row->id_detail_barang ?>"><?= $row->nama_barang ?></option>

				<?php
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input readonly name="id_user" id="id_user" class="form-control" value="<?= $user['username'] ?>">
		</div>
		<div class="form-group">
			<label for="tgl_temuan">Tanggal Temuan</label>
			<input type="date" name="tgl_temuan" id="tgl_temuan" class="form-control " value="<?= set_value('tgl_temuan'); ?>">
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
			<label for="lokasi_penemuan">Deskripsi Lokasi</label>
			<input type="text" name="lokasi_penemuan" id="lokasi_penemuan" class="form-control" value="<?= set_value('lokasi_penemuan'); ?>">
		</div>
		<div class="form-group">
			<label for="deskripsi">Deskripsi Barang</label>
			<input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?= set_value('deskripsi'); ?>">
		</div>
		<div class="form-group">
			<label for="foto_barang">Foto Barang</label>
			<input type="file" name="foto_barang" id="foto_barang" class="form-control" value="<?= set_value('foto_barang'); ?>">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Simpan Data</button>
		</div>
	</table>
	<?= form_close(); ?>
</div>