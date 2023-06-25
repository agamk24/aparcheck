<?php
require_once "../functions.php";
require_once "../koneksi.php";

check_login();

//deklarasi variable dan membaca nilai dari POST
$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : '';
$nama = $_POST['nama'] ?? '';
$nik = $_POST['nik'] ?? '';
$password = $_POST['password'] ?? '';

$isError = FALSE;
$error = '';
//cek apakah sudah disubmit / belum
if (isset($_POST['submit'])) {
	if ($nik == '') {
		$isError = TRUE;
		$error = 'Nik tidak boleh kosong';
	}
	if ($nama == '') {
		$isError = TRUE;
		$error = 'Nama tidak boleh kosong';
	}
	if ($password == '') {
		$isError = TRUE;
		$error = 'Password tidak boleh kosong';
	}

	//kalau gak eror / isError = false, maka proses data ke DB
	if ($isError == FALSE) {
		$conn = open_connection();
		$query = "INSERT INTO 
					user(
						nik,
						nama,
						password 
					)
					VALUES(
						'$nik',				
						'$nama',				
						MD5('$password')				
					);
			";

		$hasil = mysqli_query($conn, $query);

		if ($hasil) {
			$_SESSION['pesan_sukses'] = 'Berhasil Menambah data User';
			header("Location:" . BASE_URL . "user/user.php");
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
	<title>Input Data User</title>
	<link rel="icon" href="<?= BASE_URL ?>favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php include "form_user.php"; ?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>

</html>