<?php

$user = 'b24_33150898';
$pass = '8karakter';
$host = 'sql202.byethost24.com';
$db = 'b24_33150898_c6';

$conn = mysqli_connect($host, $user, $pass, $db);

// if(!$conn) {
//     echo "
//     <script>alert('Tidak terhubung ke database!')</script>
//     ";
// }

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}