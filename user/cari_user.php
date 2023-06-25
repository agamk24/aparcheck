<?php
require_once "../koneksi.php";

$conn = open_connection();

$kata_kunci = $_POST['kunci'];

$query = "SELECT * FROM user WHERE id_user LIKE '%$kata_kunci%' OR nama LIKE '%$kata_kunci%' OR nik LIKE '%$kata_kunci%'";

$hasil = mysqli_query($conn, $query);

$urut = 1;

while ($baris = mysqli_fetch_assoc($hasil)) {
	echo "<tr>";
	echo "<td>$urut</td>";
	echo "<td>$baris[id_user]</td>";
	echo "<td>$baris[nama]</td>";
	echo "<td>$baris[nik]</td>";
	echo "<td>
		<a class='btn btn-danger'  href='user_delete.php?id_user=$baris[id_user]' >Hapus</a>
		<a class='btn btn-success' href='user_edit.php?id_user=$baris[id_user]' >Ubah</a>
		</td>";
	echo "</tr>";
	$urut++;
}
