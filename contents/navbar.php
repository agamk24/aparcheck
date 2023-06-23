<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4e73df;">
        <a class="navbar-brand mx-3" href="<?= BASE_URL ?>index.php">APAR Check</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link" href="<?= BASE_URL ?>apar/apar.php">APAR</a>
                <a class="nav-item nav-link" href="<?= BASE_URL ?>masterlokasi/lokasi.php">Master Lokasi</a>
                <a class="nav-item nav-link" href="<?= BASE_URL ?>masterukuran/ukuran.php">Master Ukuran</a>
            </div>
        </div>
        <div class="navbar-nav form-inline mx-3">
            <a class="nav-link" href="<?= BASE_URL ?>logout.php">
                <?php
                require_once('koneksi.php');

                $conn = open_connection();

                $query = "SELECT name FROM user where nik ='$_SESSION[nik]'";

                $hasil = mysqli_query($conn, $query);

                // while ($baris = mysqli_fetch_assoc($hasil)) {
                //     echo "<tr>";
                //     echo "<td>$baris[name]</td>";
                //     echo "</tr>";
                //     $urut++;
                // }
                ?>
            </a>
            <a class="nav-link" href="<?= BASE_URL ?>logout.php">Logout</a>
        </div>

    </nav>
</header>