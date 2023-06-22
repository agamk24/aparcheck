<?php 
	require_once "../functions.php";
	require_once "../koneksi.php";

	check_login();

	//init Data
	$list_lokasi = get_data_lokasi();
	$list_ukuran = get_data_ukuran();

	//deklarasi variable dan membaca nilai dari POST
	$nomor_apar = isset($_POST['nomor_apar']) ? $_POST['nomor_apar'] : '' ;
	$name = $_POST['name'] ?? '';
	$date_time = $_POST['date_time'] ?? '';
	$lokasi = $_POST['lokasi'] ?? '';
	$jenis = $_POST['jenis'] ?? '';
	$ukuran = $_POST['ukuran'] ?? '';
	$masa_berlaku = $_POST['masa_berlaku'] ?? '';
	$pin = $_POST['pin'] ?? '';
	$tabung = $_POST['tabung'] ?? '';
	$nozzle = $_POST['nozzle'] ?? '';
	$selang = $_POST['selang'] ?? '';
	$tekanan = $_POST['tekanan'] ?? '';
	$kotak_apar = $_POST['kotak_apar'] ?? '';
	$keterangan = $_POST['keterangan'] ?? '';

	$isError = FALSE;
	$error = '';
	//cek apakah sudah disubmit / belum
	if(isset($_POST['submit'])){
		
		if($nomor_apar == ''){
			$isError = TRUE;
			$error = "Nomor APAR Harap diisi";
		}

		//kalau gak eror / isError = false, maka proses data ke DB
		if($isError == FALSE){
			$conn = open_connection();

			$query = "INSERT INTO 
					apar(
						nomor_apar, 
						name, 
						date_time, 
						lokasi, 
						jenis, 
						ukuran,
						masa_berlaku,
						pin,
						tabung,
						nozzle,
						selang,
						tekanan,
						kotak_apar,
						keterangan
					)
					VALUES(
						'$nomor_apar', 
						'$name', 
						'$date_time', 
						'$lokasi', 
						'$jenis', 
						'$ukuran',
						'$masa_berlaku',
						'$pin',
						'$tabung',
						'$nozzle',
						'$selang',
						'$tekanan',
						'$kotak_apar',
						'$keterangan'
					);
			";

			$hasil = mysqli_query($conn, $query);

			if($hasil){
				$_SESSION['pesan_sukses'] = 'Berhasil Menambah data apar';
				header("Location:" . BASE_URL . "apar/apar.php");
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
    <title>Input Data Apar</title>
    <?php include "../contents/headscript.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <?php include "../contents/navbar.php"; ?>

    <main>
        <?php include "form_apar.php"; ?>
    </main>

    <?php include "../contents/footer.php"; ?>
</body>

</html>