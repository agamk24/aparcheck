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

	if($row = mysqli_fetch_assoc($hasil)){
		$old_data = $row;
		$data_found = TRUE;
	}

	//ambil list jurusan
	$list_jurusan = get_data_jurusan();

	//deklarasi variable dan membaca nilai dari POST
	$npm 		= isset($_POST['npm']) 	? $_POST['npm'] : $old_data['npm'] ?? '' ;
	$nama 		= $_POST['nama'] 		?? $old_data['nama'] ?? '';
	$alamat 	= $_POST['alamat'] 		?? $old_data['alamat'] ?? '';
	$kota 		= $_POST['kota'] 		?? $old_data['kota'] ?? '';
	$tgl_lahir 	= $_POST['tgl_lahir'] 	?? $old_data['tgl_lahir'] ?? '';
	$gender 	= $_POST['gender'] 		?? $old_data['gender'] ?? '';
	$jurusan 	= $_POST['jurusan'] 	?? $old_data['kode_jurusan'] ?? '';

	$isError = FALSE;
	$error = '';

	if($data_found && isset($_POST['submit'])){
		if($npm != $old_data['npm']){
			$isError = TRUE;
			$error .= 'NPM Tidak boleh diubah !!';
		}
		if($jurusan == ''){
			$isError = TRUE;
			$error = 'Jurusan tidak boleh kosong';
		}

		if($isError == FALSE){
			$conn = open_connection();

			$query = "UPDATE apar SET 
					nama = '$nama',
					alamat = '$alamat',
					kota = '$kota',
					tgl_lahir = '$tgl_lahir',
					gender = '$gender', 
					kode_jurusan = '$jurusan'
				WHERE 
					npm = '$old_data[npm]'
			";

			$hasil = mysqli_query($conn, $query);

			if($hasil){
				$_SESSION['pesan_sukses'] = 'Berhasil mengubah data dengan NPM : ' . $old_data['npm'];
				header("Location:".BASE_URL."apar/apar.php");
			}else{
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
    <?php include "../contents/headscript.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <?php include "../contents/navbar.php"; ?>

    <main>
        <?php 
			if($data_found == TRUE){
				include "form_apar.php";
			}else{
				echo "
					<div class='alert alert-danger' role='alert'>
						Nomor Apar tidak ditemukan, silahkan kembali ke halaman Apar 
						<a class='btn btn-primary' href='". BASE_URL . "apar/apar.php'> KEMBALI </a>
					</div>

				";
			}
		?>
    </main>

    <?php include "../contents/footer.php"; ?>
</body>

</html>