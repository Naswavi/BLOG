<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

$query = "
SELECT 
    a.id,
    a.judul,
    k.nama_kategori AS kategori,
    CONCAT(p.nama_depan, ' ', p.nama_belakang) AS penulis,
    a.hari_tanggal AS tanggal,
    a.gambar
FROM artikel a
LEFT JOIN kategori k ON a.id_kategori = k.id
LEFT JOIN penulis p ON a.id_penulis = p.id
ORDER BY a.id DESC
";

$result = mysqli_query($koneksi, $query);

$data = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

echo json_encode($data);