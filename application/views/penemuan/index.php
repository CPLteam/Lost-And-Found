<div class="container-fluid">
    <div class="col-xl-12 col-lg-12">
        <h1>List Temuan Barang</h1>

        <?= anchor(site_url('penemuan/add'), 'Tambah Baru', 'class="btn btn-primary" data-toggle="modal" data-target="#modelId"');  ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No Laporan</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Tanggal temuan</th>
                    <th scope="col">Lokasi temuan</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Foto Barang</th>
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
                        <td> <?= anchor(site_url('pengambilan/add')), 'Tambah Baru', 'class="btn btn-primary" data-toggle="modal" data-target="#modelId"');?></td>
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
                    <label for="nama_barang">Nama Barang <?= form_error('id_barang') ?></label>
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
                    <label for="username">Username</label>
                    <input readonly name="id_user" id="id_user" class="form-control" value="<?= $user['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="tgl_temuan">Tanggal Temuan</label>
                    <input type="text" name="tgl_temuan" id="tgl_temuan" class="form-control " value="<?= set_value('tgl_temuan'); ?>">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
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