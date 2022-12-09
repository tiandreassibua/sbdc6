<?php include "./config/koneksi.php" ?>
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
                <h3 class="fw-semibold mb-5 text-center">Data Golongan</h3>
                <div class="modal fade" id="tambahGolongan" tabindex="-1" aria-labelledby="tambahGolonganLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="tambahGolonganLabel">Tambah Golongan Baru</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Golongan</label>
                                        <input type="text" class="form-control" id="recipient-name" name="golongan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Jabatan</label>
                                        <textarea class="form-control" id="message-text" name="jabatan" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-info">Simpan</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['submit'])) {
                                $golongan = $_POST['golongan'];
                                $jabatan = $_POST['jabatan'];

                                $cek = mysqli_num_rows(
                                    mysqli_query($conn, "SELECT golongan FROM golongan WHERE golongan = '$golongan'")
                                );
                                if ($cek == 0) {
                                    mysqli_query($conn, "INSERT INTO golongan VALUES('$golongan', '$jabatan')");
                                    echo "<script>alert('Data golongan berhasil tersimpan!')</script>";
                                    header('location:golongan.php');
                                } else {
                                    echo "<script>alert('Data golongan sudah ada!')</script>";
                                    header('location:golongan.php');
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8">
                        <!-- <a href="tambah_golongan.php" class="btn btn-success mb-3">
                            <i class="fa fa-plus"></i> Tambah Golongan
                        </a> -->
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahGolongan">
                            <i class="fa fa-plus"></i> Tambah Golongan
                        </button>
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Golongan</th>
                                    <th scope="col">Jabatan</th>
                                    <!-- <th scope="col">Opsi</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select * from golongan order by golongan asc";
                                $fetch = mysqli_query($conn, $sql);
                                while ($data = mysqli_fetch_array($fetch)) {

                                ?>
                                    <tr>
                                        <td><?= $data['golongan'] ?></td>
                                        <td><?= $data['jabatan'] ?></td>
                                        <!-- <td>
                                            <a href="hapus_golongan.php?golongan=<?= $data['golongan'] ?>" class="btn btn-sm btn-outline-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a href="edit_golongan.php?golongan=<?= $data['golongan'] ?>" class="btn btn-sm btn-outline-info">
                                                <i class="fa fa-pen-to-square"></i>
                                            </a>
                                        </td> -->
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>