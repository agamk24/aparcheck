<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #4e73df;">
    <a class="navbar-brand mx-3" href="<?= BASE_URL ?>index.php">
        <img class="bi" height="25" style="filter: brightness(0) saturate(100%) invert(100%);" src="<?= BASE_URL ?>assets/img/tj.png">
    </a>
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-item nav-link" href="<?= BASE_URL ?>apar/apar.php">APAR</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Master Data</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="<?= BASE_URL ?>masterlokasi/lokasi.php">Master Lokasi</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= BASE_URL ?>masterukuran/ukuran.php">Master Ukuran</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="<?= BASE_URL ?>about-us.php">About Us</a>
            </li>
            <li>
                <a class="nav-item nav-link" href="<?= BASE_URL ?>logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>