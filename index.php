<?php
require_once "functions.php";
check_login();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Apar & P3k Check</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="<?= BASE_URL ?>favicon.ico">
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<body>
    <?php include "contents/navbar.php"; ?>
    <main class="mt-3">
        <div class="container">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h5 class="display-6">Selamat Datang</h5>
                    <?php include "contents/modul_card.php"; ?>
                </div>
            </div>
        </div>
    </main>
    <?php include "contents/footer.php"; ?>
</body>

</html>