<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

$id = $_POST['id'] ?? 0;

if ($id == 0) {
    echo json_encode(null);
    exit;
}

$stmt = mysqli_prepare($koneksi, "SELECT * FROM kategori WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

// 🔒 CEK biar ga error undefined
if (!$row) {
    echo json_encode(null);
    exit;
}

$data = [
    'id' => $row['id'],
    'nama' => $row['nama'] ?? '',
    'keterangan' => $row['keterangan'] ?? ''
];

echo json_encode($data);