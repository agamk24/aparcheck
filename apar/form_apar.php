<?php require_once "../functions.php"; ?>
<div class="container custom-form container justify-content-center align-items-center" style="width: 500px;">
    <?php if ($isError == TRUE) : ?>

    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>

    <?php endif; ?>
    <form method="POST">
        <?php
		baseTextField($name, "name", "Nama Pemeriksa");
		baseDatePicker($date_time, "date_time", "Tanggal Pemeriksaan");
		baseTextField($nomor_apar, "nomor_apar", "Nomor APAR");
		?>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi : </label>
            <select class="form-control" id="lokasi" name="lokasi">
                <option value="">--Pilih Lokasi--</option>
                <?php
				if (count($list_lokasi) > 0) {
					foreach ($list_lokasi as $id_lokasi => $nama_lokasi) {
						$terpilih = '';
						if ($lokasi == $nama_lokasi) {
							$terpilih = 'selected';
						}
						echo "<option value='$nama_lokasi' $terpilih> $nama_lokasi </option>";
					}
				}
				?>
            </select>
        </div>
        <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran : </label>
            <select class="form-control" id="ukuran" name="ukuran">
                <option value="">--Pilih Ukuran--</option>
                <?php
				if (count($list_ukuran) > 0) {
					foreach ($list_ukuran as $id_ukuran => $nama_ukuran) {
						$terpilih = '';
						if ($ukuran == $nama_ukuran) {
							$terpilih = 'selected';
						}
						echo "<option value='$nama_ukuran' $terpilih> $nama_ukuran </option>";
					}
				}
				?>
            </select>
        </div>
        <?php
		baseRadioButton($masa_berlaku, "masa_berlaku", "Masa Berlaku");
		baseRadioButton($pin, "pin", "PIN");
		baseRadioButton($tabung, "tabung", "Tabung");
		baseRadioButton($nozzle, "nozzle", "Nozzle");
		baseRadioButton($selang, "selang", "Selang");
		baseRadioButton($tekanan, "tekanan", "Tekanan");
		baseRadioButton($kotak_apar, "kotak_apar", "Kotak Apar");
		baseTextArea($keterangan, "keterangan", "Keterangan");
		?>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>