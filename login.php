<?php
include "functions.php";
if (isset($_SESSION['nik'])) {
    header("Location:" . BASE_URL . "index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" href="<?= BASE_URL ?>favicon.ico">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body class="text-center" style="background-color: #4e73df">
    <div class="container justify-content-center align-items-center vh-100 d-flex flex-column">
        <div class="row custom-container col-md-3">
            <div class="col-lg-12">
                <form class="p-4 custom-form" method="POST">
                    <div class="mb-3 col-6">
                        <img src="assets/img/logo_tj.png" alt="Logo" class="img-fluid" width="200" height="200">
                    </div>
                    <div class="mb-3 col-12">
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                    </div>
                    <div class="mb-3 col-12">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="d-grid gap-2 col-12 mx-auto mb-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                    <?php
                    if (isset($_POST['nik']) && isset($_POST['password'])) {

                        require_once "koneksi.php";

                        $conn = open_connection();

                        $query = "SELECT * FROM user WHERE nik='$_POST[nik]' AND password=MD5('$_POST[password]') ";

                        $hasil = mysqli_query($conn, $query);

                        if ($isi = mysqli_fetch_assoc($hasil)) {
                            $_SESSION['nik'] = $isi['nik'];
                            header("Location:" . BASE_URL . "index.php");
                        } else {
                            echo "<div class='alert alert-danger' role='alert'> Username dan Password tidak Valid !! </div>";
                        }
                    }
                    ?>
                    <span class="text-muted">Copyright © Apar Check 2023</span>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>