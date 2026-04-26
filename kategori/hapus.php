<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

$id = $_POST['id'] ?? 0;

// 🔥 CEK RELASI KE ARTIKEL
$cek = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_kategori='$id'");

if (mysqli_num_rows($cek) > 0) {
    echo json_encode([
        "status" => "error",
        "pesan" => "Kategori masih digunakan di artikel"
    ]);
    exit;
}

// hapus kategori
$hapus = mysqli_query($koneksi, "DELETE FROM kategori WHERE id='$id'");

if ($hapus) {
    echo json_encode(["status" => "sukses"]);
} else {
    echo json_encode([
        "status" => "error",
        "pesan" => mysqli_error($koneksi)
    ]);
}