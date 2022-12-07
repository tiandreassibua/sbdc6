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
                    <a href="pegawai.php" class="btn btn-secondary mb-3" title="Kembali">
                        <i class="fa fa-angles-left"></i> Kembali
                    </a>
                    <!-- <a class="me-3 py-2 text-dark text-decoration-none" href="index.php">Beranda</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="pegawai.php">Pegawai</a> -->
                    <!-- <a class="me-3 py-2 text-dark text-decoration-none" href="golongan.php">Golongan</a>
                    <a class="py-2 text-dark text-decoration-none" href="kinerjapegawai.php">Kinerja Pegawai</a> -->
                </nav>
            </div>
            <?php

            $query = mysqli_query(
                $conn,
                "SELECT pegawai.*, kinerja.golongan, kinerja.tanggal_berlaku FROM pegawai, kinerja
                WHERE pegawai.nip = '$nip' and kinerja.nip = '$nip' order by tanggal_berlaku desc limit 1"
            );

            $ambil_pegawai = mysqli_fetch_array($query);
            $ambil = mysqli_fetch_array($query);
            // var_dump($ambil);

            $golongan = $ambil_pegawai['golongan'];
            $jabatan = mysqli_fetch_row(
                mysqli_query(
                    $conn,
                    "SELECT jabatan FROM golongan where golongan = '$golongan'"
                )
            );

            ?>
            <div class="pricing-header p-3 pb-md-4 mx-auto">
                <h3 class="fw-semibold text-center">Detail Pegawai</h3><br>

                <a href="edit_pegawai.php?nip=<?= $nip ?>" class="btn btn-info mb-3" title="Edit Pegawai">
                    <i class="fa fa-pen-to-square"></i>
                </a>
                <a href="hapus_pegawai.php?nip=<?= $nip ?>" class="btn btn-danger mb-3" title="Hapus Pegawai">
                    <i class="fa fa-trash"></i>
                </a>
                <table class="table table-bordered table-responsive justify-content-center align-items-center text-center">
                    <tr>
                        <th>NIP</th>
                        <td><?= $ambil_pegawai['nip'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= $ambil_pegawai['nama_lengkap'] ?></td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td><?= $ambil_pegawai['telepon'] ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            <?php
                            if ($ambil_pegawai['jenis_kelamin'] == 'L') {
                                echo "Laki-laki";
                            } else {
                                echo "Perempuan";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $ambil_pegawai['alamat'] ?></td>
                    </tr>
                    <tr>
                        <th>Golongan/Jabatan</th>
                        <td><b><?= $ambil_pegawai['golongan'] ?></b> / <?= $jabatan[0] ?></td>
                    </tr>
                </table>
                <br>
                <br>
                <h3 class="fw-semibold text-center">Jenjang Karir</h3><br>
                <a href="tambah_pegawai.php" class="btn btn-success mb-3" title="Tambah Jenjang Karir">
                    <i class="fa fa-circle-plus"></i>
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">NIP</th>
                                <th scope="col">Golongan</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Kedisiplinan</th>
                                <th scope="col">Tanggung Jawab</th>
                                <th scope="col">Sikap</th>
                                <th scope="col">Kompetensi</th>
                                <th scope="col">Total Poin</th>
                                <th scope="col">Tanggal Berlaku</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql_kinerja =
                                "SELECT
                                kinerja.*,
                                golongan.jabatan
                            FROM
                                kinerja,
                                golongan
                            WHERE
                                kinerja.nip = '$nip' AND golongan.golongan = kinerja.golongan
                            ORDER BY
                                tanggal_berlaku DESC";
                            $query_kinerja = mysqli_query($conn, $sql_kinerja);
                            $num_rows = mysqli_num_rows($query_kinerja);
                            if ($num_rows > 0) {
                                while ($kinerja = mysqli_fetch_array($query_kinerja)) {

                            ?>
                                    <tr>
                                        <th scope="row"><?= $kinerja['nip'] ?></th>
                                        <td><?= $kinerja['golongan'] ?></td>
                                        <td><?= $kinerja['jabatan'] ?></td>
                                        <td><?php if ($kinerja['kedisiplinan'] == NULL) {
                                                echo "-";
                                            } else {
                                                echo $kinerja['kedisiplinan'];
                                            }  ?></td>
                                        <td><?php if ($kinerja['tanggung_jawab'] == NULL) {
                                                echo "-";
                                            } else {
                                                echo $kinerja['tanggung_jawab'];
                                            }  ?></td>
                                        <td><?php if ($kinerja['sikap'] == NULL) {
                                                echo "-";
                                            } else {
                                                echo $kinerja['sikap'];
                                            }  ?></td>
                                        <td><?php if ($kinerja['kompetensi'] == NULL) {
                                                echo "-";
                                            } else {
                                                echo $kinerja['sikap'];
                                            }  ?></td>
                                        <td><?php if ($kinerja['total_poin'] == NULL) {
                                                echo "-";
                                            } else {
                                                echo $kinerja['total_poin'];
                                            }  ?></td>
                                        <td><?= $kinerja['tanggal_berlaku'] ?></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td>Belum ada jenjang karir</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </header>
    </div>
</body>

</html>