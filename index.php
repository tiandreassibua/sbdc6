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

            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-semibold">Selamat Datang</h1>
                <p class="fs-5 text-muted">
                    Universitas Kristen Duta Wacana didirikan pada tahun 1985 sebagai pengembangan dari Sekolah Tinggi Theologia Duta Wacana. Sekolah Tinggi Theologia Duta Wacana didirikan pada tahun 1962 sebagai penggabungan
                    dari Akademi Theologia Jogjakarta dan Sekolah Theologia
                    <br><b>Alamat: </b>Jl. Dr. Wahidin Sudirohusodo No.5-25, Kotabaru, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224
                </p>
            </div>
        </header>
        <div class="row mt-5 justify-content-center align-items-center text-center">
            <div class="col-lg-4">
                <a href="pegawai.php">
                    <img src="./img/male.png" class="img-responsive" width="150px" alt="pegawai">
                </a>

                <h2 class="fw-normal">Pegawai</h2>
                <p>Menampilkan data-data pegawai</p>
                <!-- <p><a class="btn btn-secondary" href="pegawai.php">Tambah Pegawai &raquo;</a></p> -->
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <a href="golongan.php">
                    <img src="./img/golongan.png" class="img-responsive" width="150px" alt="golongan">
                </a>

                <h2 class="fw-normal">Golongan</h2>
                <p>Berisi jabatan berdasarkan golongan pegawai.</p>
                <!-- <p><a class="btn btn-secondary" href="pegawai.php">Tambah Pegawai &raquo;</a></p> -->
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
    </div>
</body>

</html>