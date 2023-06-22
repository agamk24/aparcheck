<?php
require_once "../koneksi.php";

$conn = open_connection();

$kata_kunci = $_POST['kunci'];

$query = "SELECT * FROM lokasi WHERE id_lokasi LIKE '%$kata_kunci%' OR lokasi LIKE '%$kata_kunci%'";

$hasil = mysqli_query($conn, $query);

$urut = 1;

while ($baris = mysqli_fetch_assoc($hasil)) {
	echo "<tr>";
	echo "<td>$urut</td>";
	echo "<td>$baris[id_lokasi]</td>";
	echo "<td>$baris[lokasi]</td>";
	echo "<td>
		<a class='btn btn-danger'  href='lokasi_delete.php?id_lokasi=$baris[id_lokasi]' >Hapus</a>
		<a class='btn btn-success' href='lokasi_edit.php?id_lokasi=$baris[id_lokasi]' >Ubah</a>
		</td>";
	echo "</tr>";
	$urut++;
}
