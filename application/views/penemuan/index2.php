<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Temuan Barang</h1>

    <?= anchor(site_url('penemuan/add'), 'Tambah Baru', 'class="btn btn-primary" data-toggle="modal" data-target="#modelId"');  ?>

    <hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table table-info text-center text-gray-800">
                        <tr>
                            <th scope="col">No Laporan</th>
                            <th scope="col">Id Barang</th>
                            <th scope="col">Id User</th>
                            <th scope="col">Tanggal temuan</th>
                            <th scope="col">Lokasi temuan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Nama barang</th>
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
                                    <?= $temu['tgl_temuan'] = date('d F Y'); ?>
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
                                    ?>
                                        <!-- <button type="button" class="btn btn-danger">Belum Diambil</button> -->
                                        <?= anchor(site_url('pengambilan/add'), 'Belum Diambil', 'class="btn btn-danger" data-toggle="modal" data-target="#modelPengambilan"');  ?>
                                    <?php
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

<style type="text/css">
    #results {
        padding: 20px;
        border: 1px solid;
        background: #ccc;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Penemuan</h5>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('penemuan/add_action'); ?>
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
                    <input type="date" name="tgl_temuan" id="tgl_temuan" class="form-control" value="<?= set_value('tgl_temuan'); ?>">
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
                    <br>
                    <center>Atau</center>
                    <div id="my_camera"></div>
                    <input type=button value="Foto lewat WebCam" onClick="takeSnapshot()">
                    <input type="hidden" name="foto_barang" class="image-tag" value="<?= set_value('foto_barang'); ?>">
                    <div id="results">Foto akan terdisplay disini</div>
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

<div class="modal fade" id="modelPengambilan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Pengambilan</h5>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('pengambilan/add_action'); ?>
                <div class="form-group">
                    <label for="no_laporan">No Laporan</label>
                    <input type="readonly" name="no_laporan" id="no_laporan" class="form-control" value="
                    <?php $sql = $this->db->get('temuan')->row();
                    if ($sql->status == 0) {
                        echo set_value('no_laporan', $sql->no_laporan);
                    }
                    ?>">
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

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>

</div>
<!-- End of Main Content -->