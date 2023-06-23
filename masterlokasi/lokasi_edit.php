<?php
require_once "../functions.php";
require_once "../koneksi.php";

check_login();

$param_id_lokasi = $_GET['id_lokasi'];

$conn = open_connection();

$query = "SELECT * FROM lokasi WHERE id_lokasi='$param_id_lokasi' ";
$hasil = mysqli_query($conn, $query);

$old_data = array();
$data_found = FALSE;

if ($row = mysqli_fetch_assoc($hasil)) {
	$old_data = $row;
	$data_found = TRUE;
}

//deklarasi variable dan membaca nilai dari POST
$id_lokasi = isset($_POST['id_lokasi']) ? $_POST['id_lokasi'] :  $old_data['id_lokasi'];
$lokasi = $_POST['lokasi'] ?? $old_data['lokasi'] ?? "";

$isError = FALSE;
$error = '';

if ($data_found && isset($_POST['submit'])) {
	if ($id_lokasi != $old_data['id_lokasi']) {
		$isError = TRUE;
		$error .= 'Nomor Lokasi Tidak boleh diubah !!';
	}
	if ($lokasi == '') {
		$isError = TRUE;
		$error = 'Lokasi tidak boleh kosong';
	}

	if ($isError == FALSE) {
		$conn = open_connection();

		$query = "UPDATE lokasi SET 
					lokasi = '$lokasi'
				WHERE 
					id_lokasi = '$old_data[id_lokasi]'
			";

		$hasil = mysqli_query($conn, $query);

		if ($hasil) {
			$_SESSION['pesan_sukses'] = 'Berhasil mengubah data dengan Nomor Lokasi : ' . $old_data['id_lokasi'];
			header("Location:" . BASE_URL . "masterlokasi/lokasi.php");
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
	<title>Edit Data Lokasi</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php
		if ($data_found == TRUE) {
			include "form_lokasi.php";
		} else {
			echo "
					<div class='alert alert-danger' role='alert'>
						Nomor Lokasi tidak ditemukan, silahkan kembali ke halaman Lokasi 
						<a class='btn btn-primary' href='" . BASE_URL . "masterlokasi/lokasi.php'> KEMBALI </a>
					</div>
				";
		}
		?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>

</html>