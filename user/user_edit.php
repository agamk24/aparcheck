<?php
require_once "../functions.php";
require_once "../koneksi.php";

check_login();

$param_id_user = $_GET['id_user'];

$conn = open_connection();

$query = "SELECT * FROM user WHERE id_user='$param_id_user' ";
$hasil = mysqli_query($conn, $query);

$old_data = array();
$data_found = FALSE;

if ($row = mysqli_fetch_assoc($hasil)) {
	$old_data = $row;
	$data_found = TRUE;
}

//deklarasi variable dan membaca nilai dari POST
$id_user = isset($_POST['id_user']) ? $_POST['id_user'] :  $old_data['id_user'];
$nik = $_POST['nik'] ?? $old_data['nik'] ?? "";
$nama = $_POST['nama'] ?? $old_data['nama'] ?? "";
$password = $_POST['password'] ?? $old_data['password'] ?? "";

$isError = FALSE;
$error = '';

if ($data_found && isset($_POST['submit'])) {
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

	if ($isError == FALSE) {
		$conn = open_connection();

		$query = "UPDATE user SET 
					nama = '$nama',
					nik = '$nik',
					password = MD5('$password')
				WHERE 
					id_user = '$old_data[id_user]'
			";

		$hasil = mysqli_query($conn, $query);

		if ($hasil) {
			$_SESSION['pesan_sukses'] = 'Berhasil mengubah data user dengan id User : ' . $old_data['id_user'];
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
	<title>Edit Data User</title>
	<link rel="icon" href="<?= BASE_URL ?>favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php
		if ($data_found == TRUE) {
			include "form_user.php";
		} else {
			echo "
					<div class='alert alert-danger' role='alert'>
						Nomor User tidak ditemukan, silahkan kembali ke halaman User 
						<a class='btn btn-primary' href='" . BASE_URL . "user/user.php'> KEMBALI </a>
					</div>
				";
		}
		?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>

</html>