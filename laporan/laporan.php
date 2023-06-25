<?php
require_once "../functions.php";
check_login();

$periode = isset($_POST['periode']) ? $_POST['periode'] : '';
$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : '';
$bulan = isset($_POST['bulan']) ? $_POST['bulan'] : '';

if (!empty($periode)) {
    $queryParameters = "?periode=" . $periode;

    if ($periode == '1') {
        if (!empty($bulan)) {
            $queryParameters .= "&bulan=" . $bulan;
        }
    } else {
        if (!empty($tahun)) {
            $queryParameters .= "&tahun=" . $tahun;
        }
    }

    header("Location: laporan_result.php" . $queryParameters);
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <link rel="icon" href="<?= BASE_URL ?>favicon.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
</head>

<body>
    <?php include "../contents/navbar.php"; ?>
    <main class="my-5">
        <div class="container custom-form container justify-content-center align-items-center my-5"
            style="width: 500px;">
            <form method="POST">
                <div class="mb-3">
                    <label for="periode" class="form-label">Periode Laporan :</label>
                    <select class="form-control" name="periode" id="periode">
                        <?php
                        $periodeData = array(
                            "1" => "Bulanan",
                            "2" => "Tahunan",
                        );

                        // Menampilkan pilihan kategori
                        foreach ($periodeData as $id => $nama) {
                            echo '<option value="' . $id . '">' . $nama . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3" id="tahunContainer">
                    <label for="tahun" class="form-label">Tahun :</label>
                    <input type="text" class="form-control yearpicker" name="tahun" id="tahun">
                </div>
                <div class="mb-3" id="bulanContainer">
                    <label for="bulan" class="form-label">Bulan :</label>
                    <input type="text" class="form-control monthpicker" name="bulan" id="bulan">
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php include "../contents/footer.php"; ?>

    <script>
    $(document).ready(function() {
        // Inisialisasi monthpicker
        $(".monthpicker").datepicker({
            format: "mm/yyyy",
            startView: "months",
            minViewMode: "months",
            autoclose: true
        });

        // Inisialisasi yearpicker
        $(".yearpicker").datepicker({
            format: "yyyy",
            startView: "years",
            minViewMode: "years",
            autoclose: true
        });

        $("#tahunContainer").hide();
        // Pemantauan perubahan pada select dengan id periode
        $("#periode").change(function() {
            var selectedPeriode = $(this).val();

            if (selectedPeriode === "1") { // Jika periode bulanan dipilih
                $("#tahunContainer").hide();
                $("#bulanContainer").show();
            } else if (selectedPeriode === "2") { // Jika periode tahunan dipilih
                $("#bulanContainer").hide();
                $("#tahunContainer").show();
            } else {
                $("#tahunContainer").hide();
                $("#bulanContainer").hide();
            }
        });
    });
    </script>
</body>

</html>