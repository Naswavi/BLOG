<?php
require_once '../koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

$id   = $_POST['id'] ?? 0;
$nama = $_POST['nama'] ?? '';
$ket  = $_POST['keterangan'] ?? '';

if (!$id || !$nama) {
    echo json_encode([
        "status" => "error",
        "pesan" => "Data tidak lengkap"
    ]);
    exit;
}

$stmt = mysqli_prepare($koneksi,
    "UPDATE kategori SET nama_kategori=?, keterangan=? WHERE id=?"
);

if (!$stmt) {
    echo json_encode([
        "status" => "error",
        "pesan" => mysqli_error($koneksi)
    ]);
    exit;
}

mysqli_stmt_bind_param($stmt, "ssi", $nama, $ket, $id);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode([
        "status" => "sukses"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "pesan" => mysqli_error($koneksi)
    ]);
}