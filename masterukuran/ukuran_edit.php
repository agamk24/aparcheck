<?php
require_once "../functions.php";
require_once "../koneksi.php";

check_login();

$param_id_ukuran = $_GET['id_ukuran'];

$conn = open_connection();

$query = "SELECT * FROM ukuran WHERE id_ukuran='$param_id_ukuran' ";
$hasil = mysqli_query($conn, $query);

$old_data = array();
$data_found = FALSE;

if ($row = mysqli_fetch_assoc($hasil)) {
	$old_data = $row;
	$data_found = TRUE;
}

//deklarasi variable dan membaca nilai dari POST
$id_ukuran = isset($_POST['id_ukuran']) ? $_POST['id_ukuran'] :  $old_data['id_ukuran'];
$ukuran = $_POST['ukuran'] ?? $old_data['ukuran'] ?? "";

$isError = FALSE;
$error = '';

if ($data_found && isset($_POST['submit'])) {
	if ($id_ukuran != $old_data['id_ukuran']) {
		$isError = TRUE;
		$error .= 'Nomor Ukuran Tidak boleh diubah !!';
	}
	if ($ukuran == '') {
		$isError = TRUE;
		$error = 'Ukuran tidak boleh kosong';
	}

	if ($isError == FALSE) {
		$conn = open_connection();

		$query = "UPDATE ukuran SET 
					ukuran = '$ukuran'
				WHERE 
					id_ukuran = '$old_data[id_ukuran]'
			";

		$hasil = mysqli_query($conn, $query);

		if ($hasil) {
			$_SESSION['pesan_sukses'] = 'Berhasil mengubah data dengan Nomor Ukuran : ' . $old_data['id_ukuran'];
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
	<title>Edit Data Ukuran</title>
	<?php include "../contents/headscript.php"; ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

	<?php include "../contents/navbar.php"; ?>

	<main>
		<?php
		if ($data_found == TRUE) {
			include "form_ukuran.php";
		} else {
			echo "
					<div class='alert alert-danger' role='alert'>
						Nomor Ukuran tidak ditemukan, silahkan kembali ke halaman Ukuran 
						<a class='btn btn-primary' href='" . BASE_URL . "masterukuran/ukuran.php'> KEMBALI </a>
					</div>
				";
		}
		?>
	</main>

	<?php include "../contents/footer.php"; ?>
</body>

</html>