<?php
require_once "../functions.php";
check_login();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cetak APAR</title>
    <link rel="icon" href="<?= BASE_URL ?>favicon.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<body>
    <main class="my-5">
        <div>
            <table align="center" cellpadding="1" cellspacing="1" style="width:1057.6px;">
                <tbody>
                    <tr>
                        <td style="width: 280px;"><img alt="" src="https://ckeditor.com/apps/ckfinder/userfiles/files/Desktop%20-%201%20(5).png" style="width: 100px; height: 100px;" /></td>
                        <td style="width: 488px;">
                            <h2 style="text-align: center;"><strong>LAPORAN PEMERIKSAAN APAR</strong></h2>
                        </td>
                        <td style="width:272px"><img alt="" src="https://ckeditor.com/apps/ckfinder/userfiles/files/LOGO-K3-TRANSPARANT%201(1).png" style="width: 100px; height: 100px; float: right;" /></td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <p>&nbsp;</p>
        </div>
        <div class="container">
            <?php if (isset($_SESSION['pesan_sukses'])) : ?>
                <div class='alert alert-success' role='alert'>
                    <?php
                    echo $_SESSION['pesan_sukses'];
                    unset($_SESSION['pesan_sukses']);
                    ?>
                </div>
            <?php endif; ?>
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td scope="col">No.</td>
                            <td scope="col">Nama</td>
                            <td scope="col">Tanggal Pemeriksaan</td>
                            <td scope="col">Nomor APAR</td>
                            <td scope="col">Lokasi</td>
                            <td scope="col">Ukuran</td>
                            <td scope="col">Masa Berlaku</td>
                            <td scope="col">PIN</td>
                            <td scope="col">Tabung</td>
                            <td scope="col">Nozzle</td>
                            <td scope="col">Selang</td>
                            <td scope="col">Tekanan</td>
                            <td scope="col">Kotak APAR</td>
                            <td scope="col">Keterangan</td>
                        </tr>
                    </thead>
                    <tbody id="hasil-pencarian">
                        <?php
                        require_once "../koneksi.php";

                        $conn = open_connection();

                        $periode = $_GET['periode'];

                        $query = "SELECT * FROM apar WHERE ";

                        if ($periode === "1") {
                            $bulan = $_GET['bulan'];
                            $resultBulan = substr($bulan, 0, 2);
                            $resultTahun = substr($bulan, 3, 5);
                            $query .= "MONTH(date_time) = $resultBulan AND YEAR(date_time) = $resultTahun";
                        } else if ($periode === "2") {
                            $tahun = $_GET['tahun'];
                            $query .= "YEAR(date_time) = $tahun";
                        }

                        $hasil = mysqli_query($conn, $query);

                        $urut = 1;
                        if (mysqli_fetch_assoc($hasil)) {
                            while ($baris = mysqli_fetch_assoc($hasil)) {
                                $masa_berlaku_value = $baris["masa_berlaku"] == "1" ? 'Sesuai' : "Tidak Sesuai";
                                $pin_value = $baris["pin"] == "1" ? "Ya" : "Tidak";
                                $tabung_value = $baris["tabung"] == "1" ? "Ya" : "Tidak";
                                $nozzle_value = $baris["nozzle"] == "1" ? "Ya" : "Tidak";
                                $selang_value = $baris["selang"] == "1" ? "Ya" : "Tidak";
                                $tekanan_value = $baris["tekanan"] == "1" ? "Ya" : "Tidak";
                                $kotak_apar_value = $baris["kotak_apar"] == "1" ? "Ya" : "Tidak";

                                echo "<tr>";
                                echo "<td>$urut</td>";
                                echo "<td>$baris[name]</td>";
                                echo "<td>$baris[date_time]</td>";
                                echo "<td>$baris[nomor_apar]</td>";
                                echo "<td>$baris[lokasi]</td>";
                                echo "<td>$baris[ukuran]</td>";
                                echo "<td>$masa_berlaku_value</td>";
                                echo "<td>$pin_value</td>";
                                echo "<td>$tabung_value</td>";
                                echo "<td>$nozzle_value</td>";
                                echo "<td>$selang_value</td>";
                                echo "<td>$tekanan_value</td>";
                                echo "<td>$kotak_apar_value</td>";
                                echo "<td>$baris[keterangan]</td>";
                                echo "</tr>";
                                $urut++;
                            }
                        } else {
                            echo "<tr>";
                            echo "<td colspan= 14 align=center>Tidak Ada Data.</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include "../contents/footer.php"; ?>
</body>

</html>