<div class="row">
    <div class="col-xl-12 col-lg-12">
        <h1>List Temuan Barang</h1>
        <?php echo anchor(site_url('penemuan/add'), 'Tambah Baru', 'class="btn btn-primary"'); ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No Laporan</th>
                    <th scope="col">Id Barang</th>
                    <th scope="col">Id User</th>
                    <th scope="col">Tanggal temuan</th>
                    <th scope="col">Lokasi temuan</th>
                    <th scope="col">deskripsi</th>
                    <th scope="col">nama barang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php foreach ($temuan as $temu) : ?>
                <tbody>
                    <tr>
                        <td><?= $temu['no_laporan'] ?></td>
                        <td><?= $temu['id_barang'] ?></td>
                        <td><?= $temu['id_user'] ?></td>
                        <td><?= $temu['tgl_temuan'] = date('d F Y') ?></td>
                        <td><?= $temu['lokasi_penemuan'] ?></td>
                        <td><?= $temu['deskripsi'] ?></td>
                        <td><?= $temu['nama_barang'] ?></td>
                        <td><a href="<?= base_url(); ?>penemuan/hapus/<?= $temu['no_laporan'] ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?')">Hapus</a></td>
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