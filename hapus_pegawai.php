<?php
include "./config/koneksi.php";
$nip = $_GET['nip'];
$query_cek = mysqli_query($conn, "SELECT nip from pegawai WHERE nip = '$nip'");
if (mysqli_num_rows($query_cek) == 0) {
    header('location:pegawai.php');
}

$hapus = mysqli_query($conn, "DELETE FROM peagawai WHERE nip = '$nip'");
if ($hapus) {
    echo "<script>alert('Data pegawai berhasil dihapus!')</script>";
    echo "<script>window.location='nip.php'</script>";
}
