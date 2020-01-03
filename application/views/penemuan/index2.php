<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Temuan Barang</h1>

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
                            <th scope="col">ID Barang / Jenis Barang</th>
                            <th scope="col">ID User</th>
                            <th scope="col">Tanggal Temuan</th>
                            <th scope="col">Lokasi Temuan</th>
                            <th scope="col">Deskripsi Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Foto Barang</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        <?php foreach ($temuan as $temu) : ?>
                            <tr>
                                <td>
                                    <?= $temu['no_laporan'] ?>
                                </td>
                                <td>
                                    <?= $temu['id_barang'] ?>
                                </td>
                                <td>
                                    <?= $temu['id_user'] ?>
                                </td>
                                <td>
                                    <?= $temu['tgl_temuan'] ?>
                                </td>
                                <td>
                                    <?= $temu['lokasi_penemuan'] ?>
                                </td>
                                <td>
                                    <?= $temu['deskripsi'] ?>
                                </td>
                                <td>
                                    <?= $temu['nama_barang'] ?>
                                </td>
                                <td>
                                    <img src="<?= base_url(); ?>assets/img/<?= $temu['foto_barang'] ?>" width="90" height="110">
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>penemuan/hapus/<?= $temu['no_laporan'] ?>" class="btn btn-danger float-right" onclick="return confirm('Anda yakin ingin di hapus?')">Hapus</a>
                                </td>
                                <td>
                                    <!-- <a href=""> -->
                                    <?php
                                    // switch ($temu['status']) {
                                    //     case 0:
                                    //         echo '<button type="button" class="btn btn-danger">Belum Diambil</button>';
                                    //         break;

                                    //     case 1:
                                    //         echo '<button type="button" class="btn btn-success">Sudah Diambil</button>';
                                    //         break;
                                    // }
                                    if ($temu['status'] == 0) {
                                        echo '<button type="button" class="btn btn-danger">Belum Diambil</button>';
                                    } else {
                                        echo '<button type="button" class="btn btn-success">Sudah Diambil</button>';
                                    }
                                    ?>
                                    <!-- </a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->