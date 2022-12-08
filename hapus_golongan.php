<?php
include "./config/koneksi.php";
$golongan = $_GET['golongan'];
$query_cek = mysqli_query($conn, "SELECT * from golongan WHERE golongan = '$golongan'");
if (mysqli_num_rows($query_cek) == 0) {
    header('location:golongan.php');
}

$hapus = mysqli_query($conn, "DELETE FROM golongan WHERE golongan = '$golongan'");
if ($hapus) {
    echo "<script>alert('Data golongan berhasil dihapus!')</script>";
    echo "<script>window.location='golongan.php'</script>";
}
