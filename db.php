<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // ganti sesuai konfigurasi MySQL-mu
$dbname = 'bukutamu_db';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
