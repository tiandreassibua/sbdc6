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
                <h3 class="fw-normal text-center">Tambah Jenjang Karir</h3><br>

                <form method="post" class="row g-3">
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label">Kedisiplinan</label>
                        <input type="number" name="kedisiplinan" class="form-control" id="inputEmail4" required>
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label">Tanggung Jawab</label>
                        <input type="number" name="tanggung_jawab" class="form-control" id="inputEmail4" required>
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label">Sikap</label>
                        <input type="number" name="sikap" class="form-control" id="inputEmail4" required>
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label">Kompetensi</label>
                        <input type="number" name="kompetensi" class="form-control" id="inputEmail4" required>
                    </div>
                    <div class="col-md-2">
                        <label for="inputState" class="form-label">Golongan</label>
                        <select id="inputState" name="golongan" class="form-select" required>
                            <option selected>Pilih...</option>
                            <?php
                            include "./config/koneksi.php";

                            $q_golongan = mysqli_query($conn, "SELECT * FROM golongan ORDER BY golongan ASC");
                            while ($golongan = mysqli_fetch_array($q_golongan)) {
                            ?>
                                <option value="<?= $golongan['golongan'] ?>">
                                    <?= $golongan['golongan'] ?> - <i><?= $golongan['jabatan'] ?></i>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputEmail4" class="form-label"> </label>
                        <input type="submit" name="submit" class="form-control btn btn-block btn-lg btn-success" value="Update" />
                    </div>

                </form>
                <?php

                include "./config/koneksi.php";

                if (isset($_POST['submit'])) {

                    $dis = $_POST['kedisiplinan'];
                    $tj = $_POST['tanggung_jawab'];
                    $sikap = $_POST['sikap'];
                    $kom = $_POST['kompetensi'];
                    $total_poin = ($dis + $tj + $sikap + $kom);

                    $gol = $_POST['golongan'];
                    $nip = $nip;

                    $query = mysqli_query(
                        $conn,
                        "insert into kinerja(nip, golongan, kedisiplinan, tanggung_jawab, sikap, kompetensi, total_poin)
                        values('$nip','$gol','$dis', '$tj','$sikap','$kom','$total_poin')"
                    );

                    if ($query) {
                        echo "<script>alert('Jenjang karir pegawai berhasil disimpan!')</script>";
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