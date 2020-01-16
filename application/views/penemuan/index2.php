<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Temuan Barang</h1>

    <?= anchor(site_url('penemuan/add'), 'Tambah Baru', 'class="btn btn-primary" data-toggle="modal" data-target="#modelTemuan"');  ?>

    <hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table table-info text-center text-gray-800">
                        <tr>
                            <th scope="col">No Laporan</th>
                            <th scope="col">Id User Penemu (Username)</th>
                            <th scope="col">Tanggal Ditemukan</th>
                            <th scope="col">Jenis Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Deskripsi Barang</th>
                            <th scope="col">Lokasi Penemuan (Gedung)</th>
                            <th scope="col">Deskripsi Lokasi Penemuan</th>
                            <th scope="col">Foto Barang</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        <?php foreach ($temuan as $temu) : ?>
                            <tr>
                                <td>
                                    <?= $temu['no_laporan'] ?>
                                </td>
                                <td>
                                    <?= $temu['id_user'] ?>
                                    <br />
                                    (<?= $temu['username'] ?>)
                                </td>
                                <td>
                                    <?= $temu['tgl_temuan'] ?>
                                </td>
                                <td>
                                    <?= $temu['jenis_barang'] ?>
                                </td>
                                <td>
                                    <?= $temu['nama_barang'] ?>
                                </td>
                                <td>
                                    <?= $temu['deskripsi'] ?>
                                </td>
                                <td>
                                    <?= $temu['lantai'] ?>
                                    <br />
                                    (<?= $temu['gedung'] ?>)
                                </td>
                                <td>
                                    <?= $temu['lokasi_penemuan'] ?>
                                </td>
                                <td>
                                    <img src="<?= base_url(); ?>assets/img/<?= $temu['foto_barang'] ?>" width="90" height="110">
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
                                    ?>
                                        <!-- <button type="button" class="btn btn-danger">Belum Diambil</button> -->
                                        <?= anchor(site_url('pengambilan/add'), 'Belum Diambil', 'class="btn btn-danger" data-toggle="modal" data-target="#modelstatusPengambilan"');  ?>
                                    <?php
                                    } else {
                                        echo '<button type="button" class="btn btn-success">Sudah Diambil</button>';
                                    }
                                    ?>
                                    <!-- </a> -->
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>penemuan/hapus/<?= $temu['no_laporan'] ?>" class="btn btn-danger float-right" onclick="return confirm('Anda yakin ingin di hapus?')">Hapus</a>
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

<style type="text/css">
    #results {
        padding: 20px;
        border: 1px solid;
        background: #ccc;
    }
</style>


<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: $config['allowed_types'],
    });

    Webcam.attach('#my_camera');

    function takeSnapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script>


</div>
<!-- End of Main Content -->