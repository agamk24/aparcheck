<?php
require_once "../functions.php";
require_once "../koneksi.php";

check_login();

//deklarasi variable dan membaca nilai dari POST
$id_lokasi = isset($_POST['id_lokasi']) ? $_POST['id_lokasi'] : '';
$lokasi = $_POST['lokasi'] ?? '';

$isError = FALSE;
$error = '';
//cek apakah sudah disubmit / belum
if (isset($_POST['submit'])) {
	if ($lokasi == '') {
		$isError = TRUE;
		$error = 'Lokasi tidak boleh kosong';
	}

	//kalau gak eror / isError = false, maka proses data ke DB
	if ($isError == FALSE) {
		$conn = open_connection();
		$query = "INSERT INTO 
					lokasi(
						lokasi, 
					)
					VALUES(
						'$lokasi'				
					);
			";

		$hasil = mysqli_query($conn, $query);

		if ($hasil) {
			$_SESSION['pesan_sukses'] = 'Berhasil Menambah data Lokasi';
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
	<title>Input Data Lokasi</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php include "form_lokasi.php"; ?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>

</html>