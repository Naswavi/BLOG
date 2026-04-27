<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

$id = $_POST['id'] ?? 0;

if ($id <= 0) {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => 'ID tidak valid'
    ]);
    exit;
}

// cek apakah penulis dipakai
$q = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM artikel WHERE id_penulis='$id'");
$data = mysqli_fetch_assoc($q);

if ($data['total'] > 0) {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => 'Penulis tidak dapat dihapus karena masih digunakan pada artikel'
    ]);
    exit;
}

//  hapus
$hapus = mysqli_query($koneksi, "DELETE FROM penulis WHERE id='$id'");

if ($hapus) {
    echo json_encode([
        'status' => 'sukses',
        'pesan' => 'Data berhasil dihapus'
    ]);
} else {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => 'Gagal menghapus data'
    ]);
}
