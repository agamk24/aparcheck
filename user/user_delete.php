<?php
require_once "../koneksi.php";
require_once "../functions.php";

check_login();

$id_user = $_GET['id_user'];

$conn = open_connection();

$query = "DELETE FROM user WHERE id_user = '$id_user' ";

$hasil = mysqli_query($conn, $query);

if ($hasil) {
	$_SESSION['pesan_sukses'] = "Berhasil Menghapus data User dengan id User : $id_user";
	header("Location:" . BASE_URL . "user/user.php");
} else {
	$isError = TRUE;
	$error = "Gagal menyimpan ke database : " . mysqli_error($conn);
}
