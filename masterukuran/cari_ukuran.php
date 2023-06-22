<?php
require_once "../koneksi.php";

$conn = open_connection();

$kata_kunci = $_POST['kunci'];

$query = "SELECT * FROM ukuran WHERE id_ukuran LIKE '%$kata_kunci%' OR ukuran LIKE '%$kata_kunci%'";

$hasil = mysqli_query($conn, $query);

$urut = 1;

while ($baris = mysqli_fetch_assoc($hasil)) {
	echo "<tr>";
	echo "<td>$urut</td>";
	echo "<td>$baris[id_ukuran]</td>";
	echo "<td>$baris[ukuran]</td>";
	echo "<td>
		<a class='btn btn-danger'  href='ukuran_delete.php?id_ukuran=$baris[id_ukuran]' >Hapus</a>
		<a class='btn btn-success' href='ukuran_edit.php?id_ukuran=$baris[id_ukuran]' >Ubah</a>
		</td>";
	echo "</tr>";
	$urut++;
}
