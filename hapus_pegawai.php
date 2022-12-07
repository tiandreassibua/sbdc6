<?php
include "./config/koneksi.php";
$nip = $_GET['nip'];
echo "<script>alert('Apakah anda yakin ingin menghapus data pegawai ini?')</script>";
mysqli_query($conn, "DELETE FROM pegawai WHERE nip = '$nip'");
echo "<script>alert('Data pegawai berhasil dihapus!')</script>";
echo "<script>window.location='pegawai.php'</script>";
