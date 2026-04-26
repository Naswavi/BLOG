<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

$nama = $_POST['nama'] ?? '';
$keterangan = $_POST['keterangan'] ?? '';

if (!$nama) {
    echo json_encode(['status'=>'gagal','pesan'=>'Nama wajib diisi']);
    exit;
}

//PERHATIKAN NAMA KOLOM
$stmt = mysqli_prepare($koneksi,
    "INSERT INTO kategori (nama_kategori, keterangan) VALUES (?, ?)"
);

mysqli_stmt_bind_param($stmt, "ss", $nama, $keterangan);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['status'=>'sukses']);
} else {
    echo json_encode(['status'=>'gagal','pesan'=>'Gagal simpan']);
}