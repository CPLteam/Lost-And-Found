<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Tambah Temuan Modal-->
<div class="modal fade" id="modalTemuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Penemuan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('penemuan/cobaSimpan') ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="no_laporan">No. Laporan</label>
                        <input readonly name="no_laporan" id="no_laporan" class="form-control" value="<?= $this->No_urut->buat_no_laporan() ?>">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input readonly name="id_user" id="id_user" class="form-control" value="<?= $user['username'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="tgl_temuan">Tanggal Penemuan</label>
                        <input type="date" name="tgl_temuan" id="tgl_temuan" class="form-control" value="<?= set_value('tgl_temuan'); ?>">
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
                        <label for="deskripsi">Deskripsi Barang</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Contoh : Handphone Merek Samsung Warna Biru" value="<?= set_value('deskripsi'); ?>">
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
                        <input type="text" name="lokasi_penemuan" id="lokasi_penemuan" class="form-control" placeholder="Contoh : Disamping Lemari / Diatas Meja" value="<?= set_value('lokasi_penemuan'); ?>">
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
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>

                        <!-- <input type="hidden" name="id_temuan" value="<?= set_value('id_temuan'); ?>"> -->
                        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->

                        <button class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>