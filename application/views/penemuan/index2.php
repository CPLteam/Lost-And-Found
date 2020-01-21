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
                                        <?= anchor(site_url('pengambilan/ambil'), 'Belum Diambil', 'class="btn btn-danger" data-toggle="modal" data-target="#modelPengambilan"');  ?>
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




</div>
<!-- End of Main Content -->

<!-- Tambah Pengambilan Modal-->
<div class="modal fade" id="modelPengambilan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Pengambilan</h5>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('penemuan/ambil_action'); ?>
                <div class="form-group">
                    <label for="no_laporan">No Laporan</label>
                    <select class="form-control" name="no_laporan" id="no_laporan" required>
                        <?php
                        $sql = $this->db->get('temuan');
                        foreach ($sql->result() as $row) : ?>
                            <option value="<?= $row->no_laporan ?>"><?php if ($row->status == 0) {
                                                                        echo $row->no_laporan;
                                                                    ?> -- <?= $row->deskripsi;
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