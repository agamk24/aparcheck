<?php 
	require_once "../koneksi.php";
	require_once "../functions.php";

	check_login();

	$nomor_apar = $_GET['nomor_apar'];

	$conn = open_connection();

	$query = "DELETE FROM apar WHERE nomor_apar = '$nomor_apar' ";

	$hasil = mysqli_query($conn, $query);

	if($hasil){
		$_SESSION['pesan_sukses'] = "Berhasil Menghapus data apar dengan nomor_apar : $nomor_apar";
		header("Location:".BASE_URL."apar/apar.php");
	}else{
		$isError = TRUE;
		$error = "Gagal menyimpan ke database : " . mysqli_error($conn);
	}

?>