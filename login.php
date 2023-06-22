<?php 
	include "functions.php"; 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body class="text-center" style="background-color: #4e73df">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row custom-container">
            <div class="col-md-6 left-container shadow">
                <img src="assets/img/logo_tj.png" alt="Logo" class="img-fluid">
            </div>

            <div class="col-md-6 right-container shadow">
                <form class="p-4 custom-form" method="POST">
                    <h1 class="h3 mb-3 font-weight-normal">Welcome Back!</h1>
                    <div class="mb-3 col-8">
                        <input type="text" class="form-control rounded-pill" id="nik" name="nik" placeholder="NIK">
                    </div>
                    <div class="mb-3 col-8">
                        <input type="password" class="form-control rounded-pill" name="password" id="password"
                            placeholder="Password">
                    </div>
                    <div class="d-grid gap-2 col-8 mx-auto mb-3">
                        <button type="submit" class="btn btn-primary rounded-pill">Login</button>
                    </div>

                    <?php
					if(isset($_SESSION['nik'])){
						header("Location:" . BASE_URL . "index.php");
					}
					if(isset($_POST['nik']) && isset($_POST['password'])){
						
						require_once "koneksi.php";
						
						$conn = open_connection();

						$query = "SELECT * FROM user WHERE nik='$_POST[nik]' AND password=MD5('$_POST[password]') ";
						
						$hasil = mysqli_query($conn, $query);
						
						if($isi = mysqli_fetch_assoc($hasil)){
							$_SESSION['nik'] = $isi['nik'];
							header("Location:" . BASE_URL . "index.php");
						}else{
							echo "<div class='alert alert-danger' role='alert'> Username dan Password tidak Valid !! </div>";
						}
					} 
   			 		?>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>