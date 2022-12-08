<?php
include "./config/koneksi.php";

$golongan = $_GET['golongan'];

$query_cek = mysqli_query($conn, "SELECT * from golongan WHERE golongan = '$golongan'");
$data = mysqli_fetch_array($query_cek);
if (mysqli_num_rows($query_cek) == 0) {
    header('location:golongan.php');
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
                    <!-- <a class="me-3 py-2 text-dark text-decoration-none" href="index.php">Beranda</a>
                    <a class="me-3 py-2 text-dark text-decoration-none" href="pegawai.php">Pegawai</a> -->
                    <a class="btn btn-light" href="golongan.php">
                        <i class="fa fa-angles-left"></i> Kembali
                    </a>
                    <!-- <a class="py-2 text-dark text-decoration-none" href="kinerjapegawai.php">Kinerja Pegawai</a> -->
                </nav>
            </div>

            <div class="pricing-header p-3 pb-md-4 mx-auto">
                <h3 class="fw-normal mb-5 text-center">Edit Data Golongan</h3>

                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6">
                        <form method="post">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Golongan</label>
                                <input type="text" class="form-control" id="recipient-name" value="<?= $data['golongan'] ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Jabatan</label>
                                <textarea class="form-control" id="message-text" name="jabatan" required><?= $data['jabatan'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {

                            $jabatan = $_POST['jabatan'];

                            $update = mysqli_query($conn, "UPDATE golongan SET jabatan = '$jabatan' WHERE golongan = '$golongan'");

                            if ($update) {
                                echo "<script>alert('Data golongan berhasil diupdate!')</script>";
                                echo "<script>window.location='golongan.php'</script>";
                            } else {
                                echo "<script>alert('gagal update')</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </header>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>