<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

$stmt = mysqli_prepare($koneksi, "SELECT * FROM kategori ORDER BY id DESC");
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {

    $nama = htmlspecialchars($row['nama_kategori']);
    $keterangan = htmlspecialchars($row['keterangan'] ?? '');

    $data[] = [
        'id' => $row['id'],
        'nama' => $nama,
        'keterangan' => $keterangan
    ];
}
echo json_encode($data);