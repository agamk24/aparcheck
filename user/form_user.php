<?php require_once "../functions.php"; ?>
<div class="container custom-form container justify-content-center align-items-center my-5" style="width: 500px;">
    <?php if ($isError == TRUE) : ?>

        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>

    <?php endif; ?>
    <form method="POST">
        <?php
        baseTextField($nama, "nama", "nama");
        baseTextField($nik, "nik", "nik");
        baseTextField($password, "password", "password");
        ?>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>