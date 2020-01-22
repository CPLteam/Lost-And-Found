<!-- <h5> <?= $temuan->no_laporan ?> </h5> -->

<div class="modal fade" id="modelTemuan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pengambilan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('penemuan/add_action'); ?>

                <div class="form-group">
                    <label for="no_laporan">No. Laporan</label>
                    <input readonly name="no_laporan" id="no_laporan" class="form-control" value="<?= $temuan->no_laporan  ?>">
                </div>

                <div class="form-group">
                    <label for="nama_pengambil">nama pengambil</label>
                    <input readonly name="nama_pengambil" id="nama_pengambil" class="form-control">
                </div>

                <div class="form-group">
                    <label for="foto_barang">Foto Barang Yang Ditemukan</label>
                    <input type="file" name="foto_barang" id="foto_barang" class="form-control" value="<?= set_value('foto_barang'); ?>">
                </div>

                <!-- <div class="form-group">
                    <label for="jenis_barang">Jenis Barang Yang Ditemukan</label>
                    <select name="id_barang" id="barang" class="form-control">
                        <option value="0">-SELECT-</option>
                        <?php
                        foreach ($detail_barang->result() as $row) : ?>
                            <option value="<?php echo $row->id_barang; ?>"><?php echo $row->jenis_barang; ?></option>
                        <?php endforeach;
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_barang">Nama Barang Yang Ditemukan</label>
                    <select name="id_detail_barang" id="detail_barang" class="form-control">
                        <option value="0">-SELECT-</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Barang Yang Ditemukan</label>
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
                    <label for="lokasi_penemuan">Deskripsi Lokasi Penemuan</label>
                    <input type="text" name="lokasi_penemuan" id="lokasi_penemuan" class="form-control" placeholder="Contoh : Diatas Meja / Didalam Ruangan 615 / Di toilet" value="<?= set_value('lokasi_penemuan'); ?>">
                </div>

                <div class="form-group">
                    <label for="foto_barang">Foto Barang Yang Ditemukan</label>
                    <input type="file" name="foto_barang" id="foto_barang" class="form-control" value="<?= set_value('foto_barang'); ?>">
                </div> -->

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