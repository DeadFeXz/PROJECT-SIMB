<?php
// config/database.php

$host = 'localhost';
$dbname = 'db_sibanjir'; // Ganti dengan nama database yang akan kamu buat di phpMyAdmin
$username = 'root';
$password = ''; // Biasanya kosong di XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Set error mode ke exception untuk memudahkan debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Set default fetch mode ke associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage());
}
?>