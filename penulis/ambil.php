<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

$query = "SELECT * FROM penulis ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);

$data = [];

while ($row = mysqli_fetch_assoc($result)) {

    $nama = trim($row['nama_depan'] . ' ' . $row['nama_belakang']);

    $data[] = [
        'id' => $row['id'],
        'nama' => $nama,
        'username' => $row['username'],
        'password' => substr($row['password'], 0, 12) . '...',
        'foto' => $row['foto'] ?? 'default.png'
    ];
}

echo json_encode($data);
?>