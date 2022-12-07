<?php

$user = 'root';
$pass = '';
$host = 'localhost';
$db = 'jenjang_karir';

$conn = mysqli_connect($host, $user, $pass, $db);

// if(!$conn) {
//     echo "
//     <script>alert('Tidak terhubung ke database!')</script>
//     ";
// }

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}