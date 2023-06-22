<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();

$id_lokasi = $_GET['id_lokasi'];

$conn = open_connection();

$query = "DELETE FROM lokasi WHERE id_lokasi = '$id_lokasi' ";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
	$_SESSION['pesan_sukses'] = "Berhasil Menghapus data Lokasi dengan id lokasi : $id_lokasi";
	header("Location:" . BASE_URL . "masterlokasi/lokasi.php");
} else {
	$isError = TRUE;
	$error = "Gagal menyimpan ke database : " . mysqli_error($conn);
}
