<?php
require_once "../functions.php";
require_once "../koneksi.php";

check_login();

$param_nomor_apar = $_GET['nomor_apar'];

$conn = open_connection();

$query = "SELECT * FROM apar WHERE nomor_apar='$param_nomor_apar' ";
$hasil = mysqli_query($conn, $query);

$old_data = array();
$data_found = FALSE;

if ($row = mysqli_fetch_assoc($hasil)) {
	$old_data = $row;
	$data_found = TRUE;
}

//init Data
$list_lokasi = get_data_lokasi();
$list_ukuran = get_data_ukuran();

//deklarasi variable dan membaca nilai dari POST
$nomor_apar = isset($_POST['nomor_apar']) ? $_POST['nomor_apar'] :  $old_data['nomor_apar'];
$name = $_POST['name'] ?? $old_data['name'] ?? "";
$date_time = $_POST['date_time'] ?? $old_data['date_time'] ?? "";
$lokasi = $_POST['lokasi'] ?? $old_data['lokasi'] ?? "";
$jenis = $_POST['jenis'] ?? $old_data['jenis'] ?? "";
$ukuran = $_POST['ukuran'] ?? $old_data['ukuran'] ?? "";
$masa_berlaku = $_POST['masa_berlaku'] ?? $old_data['masa_berlaku'] ?? "";
$pin = $_POST['pin'] ?? $old_data['pin'] ?? "";
$tabung = $_POST['tabung'] ?? $old_data['tabung'] ?? "";
$nozzle = $_POST['nozzle'] ?? $old_data['nozzle'] ?? "";
$selang = $_POST['selang'] ?? $old_data['selang'] ?? "";
$tekanan = $_POST['tekanan'] ?? $old_data['tekanan'] ?? "";
$kotak_apar = $_POST['kotak_apar'] ?? $old_data['kotak_apar'] ?? "";
$keterangan = $_POST['keterangan'] ?? $old_data['keterangan'] ?? "";

$isError = FALSE;
$error = '';

if ($data_found && isset($_POST['submit'])) {
	if ($nomor_apar != $old_data['nomor_apar']) {
		$isError = TRUE;
		$error .= 'Nomor Apar Tidak boleh diubah !!';
	}
	if ($lokasi == '') {
		$isError = TRUE;
		$error = 'Lokasi tidak boleh kosong';
	}
	if ($ukuran == '') {
		$isError = TRUE;
		$error = 'Ukuran tidak boleh kosong';
	}

	if ($isError == FALSE) {
		$conn = open_connection();

		$masa_berlaku_value = ($masa_berlaku == 'Ya') ? 1 : 0;
		$pin_value = ($pin == 'Ya') ? 1 : 0;
		$tabung_value = ($tabung == 'Ya') ? 1 : 0;
		$nozzle_value = ($nozzle == 'Ya') ? 1 : 0;
		$selang_value = ($selang == 'Ya') ? 1 : 0;
		$tekanan_value = ($tekanan == 'Ya') ? 1 : 0;
		$kotak_apar_value = ($kotak_apar == 'Ya') ? 1 : 0;

		$query = "UPDATE apar SET 
					name = '$name', 
					date_time = '$date_time', 
					lokasi = '$lokasi', 
					jenis = '$jenis', 
					ukuran = '$ukuran',
					masa_berlaku = '$masa_berlaku_value',
					pin = '$pin_value',
					tabung = '$tabung_value',
					nozzle = '$nozzle_value',
					selang = '$selang_value',
					tekanan = '$tekanan_value',
					kotak_apar = '$kotak_apar_value',
					keterangan = '$keterangan'
				WHERE 
					nomor_apar = '$old_data[nomor_apar]'
			";

		$hasil = mysqli_query($conn, $query);

		if ($hasil) {
			$_SESSION['pesan_sukses'] = 'Berhasil mengubah data dengan Nomor Apar : ' . $old_data['nomor_apar'];
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
	<title>Edit Data Apar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php
		if ($data_found == TRUE) {
			include "form_apar.php";
		} else {
			echo "
					<div class='alert alert-danger' role='alert'>
						Nomor Apar tidak ditemukan, silahkan kembali ke halaman Apar 
						<a class='btn btn-primary' href='" . BASE_URL . "apar/apar.php'> KEMBALI </a>
					</div>

				";
		}
		?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>

</html>