<?php
require_once "functions.php";
check_login();

?>
<!DOCTYPE html>
<html>

<head>
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                    <h5 class="display-6">About Us</h5>
                    <div class="container">
                        <div class="row row-cols-2">
                            <div class="col">
                                <div class="card mb-3" style="max-width: 500px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= BASE_URL ?>assets/img/agam.jpg"
                                                class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Muhammad Agam Kurniawan | 202043500619</h5>
                                                <p class="card-text">Kontribusi : </p>
                                                <p class="card-text"> - Login, Homepage, Apar, Masterdata, About us</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-3" style="max-width: 500px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= BASE_URL ?>assets/img/diki.jpg"
                                                class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Diki Permana Putra | 202043500643</h5>
                                                <p class="card-text">Kontribusi : </p>
                                                <p class="card-text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-3" style="max-width: 500px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= BASE_URL ?>assets/img/ajis.jpg"
                                                class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Malik Abdul Azis | 202043500656</h5>
                                                <p class="card-text">Kontribusi : </p>
                                                <p class="card-text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-3" style="max-width: 500px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= BASE_URL ?>assets/img/irfan.jpg"
                                                class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Muhamad Irfan | 202043500703</h5>
                                                <p class="card-text">Kontribusi : </p>
                                                <p class="card-text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-3" style="max-width: 500px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= BASE_URL ?>assets/img/ali.jpg"
                                                class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Ali Al Husaini | 202043502491</h5>
                                                <p class="card-text">Kontribusi : </p>
                                                <p class="card-text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-3" style="max-width: 500px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= BASE_URL ?>assets/img/zuhriatin.jpg"
                                                class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Zuhriatin Solihah | 202043502495</h5>
                                                <p class="card-text">Kontribusi : </p>
                                                <p class="card-text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-3" style="max-width: 500px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?= BASE_URL ?>assets/img/meli.jpg"
                                                class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Lizuanda Mellya Audria | 202043500697</h5>
                                                <p class="card-text">Kontribusi : </p>
                                                <p class="card-text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include "contents/footer.php"; ?>
</body>

</html>