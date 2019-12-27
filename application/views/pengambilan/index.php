<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800">List Pengambilan Barang</h1>

	<?php echo anchor(site_url('penemuan/add'), 'Tambah Baru', 'class="btn btn-primary"'); ?>

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
	<!-- /.container-fluid -->