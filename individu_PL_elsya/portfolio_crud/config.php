<?php
$host = 'localhost';
$dbname = 'portfolio_elsya';
$username = 'root'; // ganti jika perlu
$password = '';     // ganti jika perlu

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>