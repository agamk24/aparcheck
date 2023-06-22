<?php 
	require_once "../koneksi.php";

	$conn = open_connection();

	$kata_kunci = $_POST['kunci'];

	$query = "SELECT * FROM apar WHERE name LIKE '%$kata_kunci%' OR date_time LIKE '%$kata_kunci%' OR nomor_apar LIKE '%$kata_kunci%' OR lokasi LIKE '%$kata_kunci%'";

	$hasil = mysqli_query($conn, $query);

	$urut = 1;

	while($baris = mysqli_fetch_assoc($hasil)){
		echo "<tr>";
		echo "<td>$urut</td>";
		echo "<td>$baris[name]</td>";
		echo "<td>$baris[date_time]</td>";
		echo "<td>$baris[nomor_apar]</td>";
		echo "<td>$baris[lokasi]</td>";
		echo "<td>$baris[ukuran]</td>";
		echo "<td>
		<a class='btn btn-danger'  href='apar_delete.php?nomor_apar=$baris[nomor_apar]' >Hapus</a>
		<a class='btn btn-success' href='apar_edit.php?nomor_apar=$baris[nomor_apar]' >Ubah</a>
		</td>";
		echo "</tr>";
		$urut++;
	}
