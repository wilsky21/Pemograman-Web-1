<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Ganti Password - Universitas";
require_once "../template/header.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = "";
if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Ganti password berhasil !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'err1') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-xmark"></i> Ganti password gagal, konfirmasi password tidak sama !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'err2') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-xmark"></i> Ganti password gagal,  password lama tidak cocok  !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'err3') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-xmark"></i> Ganti password gagal, terjadi kesalahan saat mengupdate password !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Password</h1>
            <ol class="breadcrumb mb-4 ">
                <li class="breadcrumb-item "><a href="../index.php"> Home</a></li>
                <li class="breadcrumb-item active ">Ganti Password</li>
            </ol>
            <form action="proses-password.php" method="post">
                <?php
                if ($msg !== '') {
                    echo $alert;
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2 "><i class="fa-solid fa-pen-to-square"></i>Ganti Password</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end me-2"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-2"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="CurPass" class="form-label">Password Lama</label>
                                <input type="Password" class="form-control" id="CurPass" name="CurPass" placeholder="Masukkan Password Anda Saat Ini" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="NewPass" class="form-label">Password Baru</label>
                                <input type="Password" class="form-control" id="NewPass" name="NewPass" minlength="4" maxlength="8" placeholder="Masukkan Password Baru Anda " required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="ConfPass" class="form-label">Konfirmasi Password </label>
                                <input type="Password" class="form-control" id="ConfPass" name="ConfPass" placeholder="Ulangi Password Baru Anda ">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <?php
    require_once "../template/footer.php";
    ?>
</div>