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
                <h3 class="fw-normal mb-3">Data Golongan</h3>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6">
                        <!-- <form method="post" class="row mb-3">
                            <div class="col-md-5 mb-3">
                                <input type="text" class="form-control" placeholder="Golongan" aria-label="First name">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" placeholder="Jabatan" aria-label="Last name">
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-block btn-success mt-3 text-start" value="Tambah" placeholder="Last name" aria-label="Last name">
                            </div>
                        </form> -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Golongan</th>
                                    <th scope="col">Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include "./config/koneksi.php";
                                $sql = "select * from golongan order by golongan asc";
                                $fetch = mysqli_query($conn, $sql);
                                while ($data = mysqli_fetch_array($fetch)) {

                                ?>
                                    <tr>
                                        <td><?= $data['golongan'] ?></td>
                                        <td><?= $data['jabatan'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </header>
    </div>
</body>

</html>