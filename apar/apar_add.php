<?php
require_once "../functions.php";
require_once "../koneksi.php";

check_login();

//init Data
$list_lokasi = get_data_lokasi();
$list_ukuran = get_data_ukuran();

//deklarasi variable dan membaca nilai dari POST
$nomor_apar = isset($_POST['nomor_apar']) ? $_POST['nomor_apar'] : '';
$name = $_POST['name'] ?? '';
$date_time = $_POST['date_time'] ?? '';
$lokasi = $_POST['lokasi'] ?? '';
$jenis = $_POST['jenis'] ?? '';
$ukuran = $_POST['ukuran'] ?? '';
$masa_berlaku = $_POST['masa_berlaku'] ?? '';
$pin = $_POST['pin'] ?? '';
$tabung = $_POST['tabung'] ?? '';
$nozzle = $_POST['nozzle'] ?? '';
$selang = $_POST['selang'] ?? '';
$tekanan = $_POST['tekanan'] ?? '';
$kotak_apar = $_POST['kotak_apar'] ?? '';
$keterangan = $_POST['keterangan'] ?? '';

$isError = FALSE;
$error = '';
//cek apakah sudah disubmit / belum
if (isset($_POST['submit'])) {

	if ($nomor_apar == '') {
		$isError = TRUE;
		$error = "Nomor APAR Harap diisi";
	}
	if ($lokasi == '') {
		$isError = TRUE;
		$error = 'Lokasi tidak boleh kosong';
	}
	if ($ukuran == '') {
		$isError = TRUE;
		$error = 'Ukuran tidak boleh kosong';
	}

	//kalau gak eror / isError = false, maka proses data ke DB
	if ($isError == FALSE) {
		$conn = open_connection();

		$masa_berlaku_value = ($masa_berlaku == 'Ya') ? 1 : 0;
		$pin_value = ($pin == 'Ya') ? 1 : 0;
		$tabung_value = ($tabung == 'Ya') ? 1 : 0;
		$nozzle_value = ($nozzle == 'Ya') ? 1 : 0;
		$selang_value = ($selang == 'Ya') ? 1 : 0;
		$tekanan_value = ($tekanan == 'Ya') ? 1 : 0;
		$kotak_apar_value = ($kotak_apar == 'Ya') ? 1 : 0;

		$query = "INSERT INTO 
					apar(
						nomor_apar, 
						name, 
						date_time, 
						lokasi, 
						jenis, 
						ukuran,
						masa_berlaku,
						pin,
						tabung,
						nozzle,
						selang,
						tekanan,
						kotak_apar,
						keterangan
					)
					VALUES(
						'$nomor_apar', 
						'$name', 
						'$date_time', 
						'$lokasi', 
						'$jenis', 
						'$ukuran',
						'$masa_berlaku_value',
						'$pin_value',
						'$tabung_value',
						'$nozzle_value',
						'$selang_value',
						'$tekanan_value',
						'$kotak_apar_value',
						'$keterangan'
					);
			";

		$hasil = mysqli_query($conn, $query);

		if ($hasil) {
			$_SESSION['pesan_sukses'] = 'Berhasil Menambah data apar';
			header("Location:" . BASE_URL . "apar/apar.php");
		} else {
			$isError = TRUE;
			$error = "Gagal menyimpan ke database : " . mysqli_error($conn);
		}
	}
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Input Data Apar</title>
    <link rel="icon" href="<?= BASE_URL ?>favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <?php include "../contents/navbar.php"; ?>

    <main>
        <?php include "form_apar.php"; ?>
    </main>

    <?php include "../contents/footer.php"; ?>
</body>

</html>