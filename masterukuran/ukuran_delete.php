<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();

$id_ukuran = $_GET['id_ukuran'];

$conn = open_connection();

$query = "DELETE FROM ukuran WHERE id_ukuran = '$id_ukuran' ";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
	$_SESSION['pesan_sukses'] = "Berhasil Menghapus data Ukuran dengan id ukuran : $id_ukuran";
	header("Location:" . BASE_URL . "masterukuran/ukuran.php");
} else {
	$isError = TRUE;
	$error = "Gagal menyimpan ke database : " . mysqli_error($conn);
}
