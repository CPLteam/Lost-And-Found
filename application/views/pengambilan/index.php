<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">List Pengambilan Barang</h1>


	<?= anchor(site_url('pengambilan/add'), 'Tambah Baru', 'class="btn btn-primary" data-toggle="modal" data-target="#modelId"');  ?>


	<hr>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="table table-info text-center text-gray-800">
						<tr>
							<th scope="col">No Laporan</th>
							<th scope="col">Nama Pengambil</th>
							<th scope="col">No HP</th>
							<th scope="col">Tanggal temuan</th>
							<th scope="col">Foto Pengambil</th>
						</tr>
					</thead>
					<tbody class="text-gray-800">
						<?php foreach ($pengambilan as $ambil) : ?>

							<tr>
								<td><?= $ambil['no_laporan'] ?></td>
								<td><?= $ambil['nama_pengambil'] ?></td>
								<td><?= $ambil['no_hp'] ?></td>
								<td><?= $ambil['tgl_pengambilan'] = date('d F Y') ?></td>
								<td><img src="<?= base_url();  ?>assets/img/<?= $ambil['foto_pengambil'] ?>" width="90" height="110"></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<nav aria-label="Page navigation example">
					<ul class="pagination">
						<li class="page-item"><a class="page-link" href="#">Previous</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					</ul>
				</nav>
			</div>
		</div>

	</div>
</div>
<!-- /.container-fluid -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
							<option><?php echo $row->no_laporan; ?></option>
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

<script>
	$('#exampleModal').on('show.bs.modal', event => {
		var button = $(event.relatedTarget);
		var modal = $(this);
		// Use above variables to manipulate the DOM

	});
</script>