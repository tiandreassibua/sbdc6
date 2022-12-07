<?php
include "./config/koneksi.php";
$nip = $_GET['nip'];
$query_cek = mysqli_query($conn, "SELECT * from pegawai WHERE nip = '$nip'");
if (mysqli_num_rows($query_cek) == 0) {
    header('location:pegawai.php');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SBD-C6</title>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="./img/favicon.ico">
    
    <!-- bootswatch -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

</head>

<body>
    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4 fw-bold"><i class="fa fa-newspaper"></i> JENJANG KARIR</span>
                </a>

                <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                    <a href="detail_pegawai.php?nip=<?= $nip ?>" class="btn btn-secondary mb-3" title="Kembali">
                        <i class="fa fa-angles-left"></i> Kembali
                    </a>
                    <!-- <a class="me-3 py-2 text-dark text-decoration-none" href="index.php">Beranda</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="pegawai.php">Pegawai</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="golongan.php">Golongan</a> -->
                    <!-- <a class="py-2 text-dark text-decoration-none" href="kinerjapegawai.php">Kinerja Pegawai</a> -->
                </nav>
            </div>

            <div class="pricing-header p-3 pb-md-4 mx-auto">
                <h3 class="fw-normal text-center">Update Pegawai</h3><br>

                <form method="post" class="row g-3">
                    <?php
                    $get_pegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE nip = '$nip'");
                    $pegawai = mysqli_fetch_array($get_pegawai);
                    ?>
                    <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">NIP</label>
                        <input type="number" name="nip" class="form-control" id="inputEmail4" value="<?= $pegawai['nip'] ?>" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" id="inputPassword4" value="<?= $pegawai['nama_lengkap'] ?>" placeholder="Masukan nama lengkap" required>
                    </div>
                    <div class="col-md-3">
                        <label for="inputAddress" class="form-label">Telepon</label>
                        <input type="number" name="telepon" class="form-control" id="inputAddress" value="<?= $pegawai['telepon'] ?>" placeholder="08XXXXXXX">
                    </div>
                    <div class="col-md-12">
                        <label for="inputAddress2" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="inputAddress2" cols="20" rows="5"><?= $pegawai['alamat'] ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="L" <?php if ($pegawai['jenis_kelamin'] == 'L') echo "checked"; ?>>
                            <label class="form-check-label" for="gridRadios1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="P" <?php if ($pegawai['jenis_kelamin'] == 'P') echo "checked"; ?>>
                            <label class="form-check-label" for="gridRadios2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <input type="submit" name="update" class="btn btn-block btn-lg btn-success" value="Update" />
                </form>
                <?php

                include "./config/koneksi.php";

                if (isset($_POST['update'])) {
                    $nip = $nip;
                    $nama = $_POST['nama_lengkap'];
                    $telp = strval($_POST['telepon']);
                    $alamat = $_POST['alamat'];
                    $jk = $_POST['jenis_kelamin'];

                    $q_u_pegawai = mysqli_query(
                        $conn,
                        "UPDATE pegawai SET nama_lengkap = '$nama', telepon = '$telp', alamat = '$alamat', jenis_kelamin = '$jk' WHERE nip = '$nip'"
                    );

                    if ($q_u_pegawai) {
                        echo "<script>alert('Data pegawai berhasil diupdate!')</script>";
                        echo "<script>window.location='detail_pegawai.php?nip=$nip'</script>";
                    } else {
                        echo "<script>alert('gagal')</script>";
                    }
                }

                ?>
            </div>
        </header>
    </div>
</body>

</html>