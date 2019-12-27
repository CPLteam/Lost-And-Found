	<center>
		<h1>Form Penemuan</h1>
	</center>
	<script>
	$(  {
		$( "#tgl_temuan" ).datepicker({
			format: 'yyyy-mm-dd',
			autoclose:true
		});
	});
	</script>
	<h1>&nbsp;</h1>
	<?= form_open_multipart('penemuan/add_action'); ?>
		<table cellspacing="1" cellpadding="1">
			<tr>
				<td>Jenis Barang</td>
				<td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
				<td>
    				<select name="id_barang" class="form-control">
    					<option value="1">Peralatan Kuliah - Buku</option>
    					<option value="2">Peralatan Kuliah - Tempat Pensil</option>
    					<option value="3">Peralatan Kuliah - Aksesoris</option>
						<option value="4">Tas</option>
						<option value="5">Dompet</option>
						<option value="6">Kartu</option>
						<option value="7">Elektronik - HP</option>
						<option value="8">Elektronik - Laptop</option>
						<option value="9">Elektronik - Aksesoris</option>
						<option value="10">Baju</option>
						<option value="11">Sepatu</option>
						<option value="12">Hijab</option>
						<option value="13">Almamater</option>
						<option value="14">Jam Tangan</option>
						<option value="15">Kacamata</option>
						<option value="16">Kecantikan</option>
						<option value="17">Helm</option>
						<option value="18">Jaket</option>
						<option value="19">Botol dan Peralatan Makan</option>
						<option value="20">Peralatan Sholat</option>
						<option value="21">Lain-lain</option>
    				</select>
    			</td>
			</tr>
			<tr>
				<td colspan=3>
					<h1></h1>
				</td>
			</tr>
			<tr>
				<td>Username</td>
				<td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
				<td><input readonly name="id_user" id="id_user" class="form-control" value="<?= $user['username']?>"></td>
			</tr>
			<tr>
				<td colspan=3>
					<h1></h1>
				</td>
			</tr>
			<tr>
				<td>Tanggal Temuan</td>
				<td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
				<td><input type="text" name="tgl_temuan" id="tgl_temuan" class="form-control "></td>
			</tr>
			<tr>
				<td colspan=3>
					<h1></h1>
				</td>
			</tr>
			<tr>
				<td>Lokasi Penemuan</td>
				<td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
				<td>
    				<select name="id_lokasi" class="form-control">
    					<option value="1">Lobby</option>
    					<option value="2">Lantai 2</option>
    					<option value="3">Lantai 3</option>
						<option value="4">Lantai 4</option>
						<option value="5">Lantai 5</option>
						<option value="6">Lantai 6</option>
						<option value="7">Lantai 7</option>
						<option value="8">Basement 1</option>
						<option value="9">Basement 2</option>
    				</select>
    			</td>
			</tr>
			<tr>
				<td colspan=3>
					<h1></h1>
				</td>
			</tr>
			<tr>
				<td>Deskripsi Lokasi</td>
				<td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
				<td><input type="text" name="lokasi_penemuan" id="lokasi_penemuan" class="form-control" value="<?= set_value('lokasi_penemuan'); ?>"></td>
			</tr>
			<tr>
				<td colspan=3>
					<h1></h1>
				</td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
				<td><input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?= set_value('deskripsi'); ?>"></td>
			</tr>
			<tr>
				<td colspan=3>
					<h1></h1>
				</td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
				<td><input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= set_value('nama_barang'); ?>"></td>
			</tr>
			<tr>
				<td colspan=3>
					<h1></h1>
				</td>
			</tr>
			<!-- <tr>
				<td>Foto Barang</td>
				<td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
				<td><input type="text" name="foto_barang" class="form-control"></td>
			</tr> -->
			<tr>
				<td>Foto Barang</td>
				<td>&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;</td>
				<td><input type="file" name="foto_barang" id="foto_barang" class="form-control" value="<?= set_value('foto_barang'); ?>"></td>
			</tr>
			<tr>
				<td colspan=3>
					<h1></h1>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
				<td><button type="submit" class="btn btn-primary">Simpan Data</button></td>
			</tr>
		</table>
	<?= form_close(); ?>
	</div>