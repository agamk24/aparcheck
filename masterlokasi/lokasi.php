<?php
require_once "../functions.php";
check_login();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Pengecekan APAR</title>
    <?php include "../contents/headscript.php"; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php include "../contents/navbar.php"; ?>

    <main>
        <div class="container">
            <?php if (isset($_SESSION['pesan_sukses'])) : ?>
                <div class='alert alert-success' role='alert'>
                    <?php
                    echo $_SESSION['pesan_sukses'];
                    unset($_SESSION['pesan_sukses']);
                    ?>
                </div>
            <?php endif; ?>
            <div class="row mb-2">
                <div class="col align-self-start">
                    <a href="<?= BASE_URL ?>masterlokasi/lokasi_add.php" class="btn btn-primary mb-3">Tambah
                        Lokasi</a>
                </div>
                <div class="col align-self-end">
                    <input class="form-control" type="text" id="kata_kunci" placeholder="Masukan Keyword">
                </div>
            </div>
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td scope="col">#</td>
                            <td scope="col">ID Lokasi</td>
                            <td scope="col">Lokasi</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody id="hasil-pencarian">
                        <?php
                        require_once "../koneksi.php";

                        $conn = open_connection();

                        $query = "SELECT * FROM lokasi";

                        $hasil = mysqli_query($conn, $query);

                        $urut = 1;

                        while ($baris = mysqli_fetch_assoc($hasil)) {
                            echo "<tr>";
                            echo "<td>$urut</td>";
                            echo "<td>$baris[id_lokasi]</td>";
                            echo "<td>$baris[lokasi]</td>";
                            echo "<td>
                                     <a class='btn btn-success' href='lokasi_edit.php?id_lokasi=$baris[id_lokasi]' >Ubah</a>
									<a class='btn btn-danger'  href='lokasi_delete.php?id_lokasi=$baris[id_lokasi]' >Hapus</a>
								</td>";
                            echo "</tr>";
                            $urut++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include "../contents/footer.php"; ?>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#kata_kunci").keyup(function() {
                var ketikan = this.value
                $.post(
                    "cari_lokasi.php", {
                        kunci: ketikan
                    }
                ).done(function(data) {
                    $("#hasil-pencarian").html(data)
                });

            });
        });
    </script>
</body>

</html>