<div class="row">
	<div class="col-xl-12 col-lg-12">
		<h1>List Pengambilan Barang</h1>
		<?php echo anchor(site_url('pengambilan/add'), 'Tambah Baru', 'class="btn btn-primary"'); ?>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">No Laporan</th>
					<th scope="col">Nama Pengambil</th>
					<th scope="col">No HP</th>
					<th scope="col">Tanggal temuan</th>
					<th scope="col">Foto Pengambil</th>
				</tr>
			</thead>
			<?php foreach ($pengambilan as $ambil) : ?>
				<tbody>
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
<!-- /.container-fluid -->