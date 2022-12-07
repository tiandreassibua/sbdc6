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
                    <a class="me-3 py-2 text-dark text-decoration-none" href="index.php">Beranda</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="pegawai.php">Pegawai</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="golongan.php">Golongan</a>
                    <!-- <a class="py-2 text-dark text-decoration-none" href="kinerjapegawai.php">Kinerja Pegawai</a> -->
                </nav>
            </div>

            <div class="pricing-header p-3 pb-md-4 mx-auto">
                <h3 class="fw-normal text-center">Data Pegawai</h3><br>
                <a href="tambah_pegawai.php" class="btn btn-success mb-3"><i class="fa fa-plus"></i> Tambah Pegawai</a>
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include "./config/koneksi.php";
                            $sql = "select * from pegawai order by nip asc";
                            $query = mysqli_query($conn, $sql);
                            while ($data = mysqli_fetch_array($query)) {

                            ?>
                                <tr>
                                    <th scope="row"><?= $data['nip'] ?></th>
                                    <td><?= $data['nama_lengkap'] ?></td>
                                    <td><?= $data['telepon'] ?></td>
                                    <td>
                                        <?php
                                        if ($data['jenis_kelamin'] == "L") {
                                            echo "Laki-laki";
                                        } else {
                                            echo "Perempuan";
                                        }
                                        ?>
                                    </td>
                                    <td class="text-start"><?= $data['alamat'] ?></td>
                                    <td>
                                        <a href="detail_pegawai.php?nip=<?= $data['nip'] ?>" class="btn btn-outline-success" title="Detail"><i class="fa fa-eye"></i></a>
                                    </td>
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