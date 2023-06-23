<?php
require_once "../functions.php";
require_once "../koneksi.php";

check_login();

//deklarasi variable dan membaca nilai dari POST
$id_ukuran = isset($_POST['id_ukuran']) ? $_POST['id_ukuran'] : '';
$ukuran = $_POST['ukuran'] ?? '';

$isError = FALSE;
$error = '';
//cek apakah sudah disubmit / belum
if (isset($_POST['submit'])) {
	if ($ukuran == '') {
		$isError = TRUE;
		$error = 'Ukuran tidak boleh kosong';
	}

	//kalau gak eror / isError = false, maka proses data ke DB
	if ($isError == FALSE) {
		$conn = open_connection();
		$query = "INSERT INTO 
					ukuran(
						ukuran, 
					)
					VALUES(
						'$ukuran'				
					);
			";

		$hasil = mysqli_query($conn, $query);

		if ($hasil) {
			$_SESSION['pesan_sukses'] = 'Berhasil Menambah data Ukuran';
			header("Location:" . BASE_URL . "masterukuran/ukuran.php");
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
	<title>Input Data Ukuran</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php include "form_ukuran.php"; ?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>

</html>