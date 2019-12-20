<style type="text/css">
    .status {
        width: 20px;
        height: 20px;
        float: left;
    }
</style>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <h1>List Temuan Barang</h1>
        <?php echo anchor(site_url('penemuan/add'), 'Tambah Baru', 'class="btn btn-primary float-left"'); ?>
        <table class="table">
            <!-- <ul>
                <li>
                    <div class="rounded-circle bg-danger status"></div>&nbsp;Barang Belum Diambil
                </li>
                <li>
                    <div class="rounded-circle bg-success status"></div>&nbsp;Barang Sudah Diambil
                </li>
            </ul> -->
            <thead>
                <tr>
                    <th scope="col">No Laporan</th>
                    <th scope="col">Id Barang</th>
                    <th scope="col">Id User</th>
                    <th scope="col">Tanggal temuan</th>
                    <th scope="col">Lokasi temuan</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <?php foreach ($temuan as $temu) : ?>
                <tbody>
                    <tr>
                        <td><?= $temu['no_laporan'] ?></td>
                        <td><?= $temu['id_barang'] ?></td>
                        <td><?= $temu['id_user'] ?></td>
                        <td><?= $temu['tgl_temuan'] ?></td>
                        <td><?= $temu['lokasi_penemuan'] ?></td>
                        <td><?= $temu['deskripsi'] ?></td>
                        <td><?= $temu['nama_barang'] ?></td>
                        <td><img src="<?= base_url();  ?>assets/img/<?= $temu['foto_barang'] ?>" width="90" height="110"></td>
                        <td><a href="<?= base_url(); ?>penemuan/hapus/<?= $temu['no_laporan'] ?>" class="btn btn-danger float-right" onclick="return confirm('yakin?')">Hapus</a></td>
                        <td>
                            <a href="">
                                <?php
                                switch ($temu['status']) {
                                    case 0:
                                        echo '<button type="button" class="btn btn-danger">Belum Diambil</button>';
                                        break;

                                    case 1:
                                        echo '<button type="button" class="btn btn-success">Sudah Diambil</button>';
                                        break;
                                }
                                ?>
                            </a>
                        </td>
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