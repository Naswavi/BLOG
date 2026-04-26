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

# CEK APAKAH PUNYA ARTIKEL
    $cek = mysqli_prepare($koneksi, "SELECT COUNT(*) as total FROM artikel WHERE id_penulis=?");
    mysqli_stmt_bind_param($cek, "i", $id);
    mysqli_stmt_execute($cek);
    $res = mysqli_stmt_get_result($cek);
    $data = mysqli_fetch_assoc($res);

if ($data['total'] > 0) {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => 'Penulis masih memiliki artikel'
    ]);
    exit;
}

# AMBIL FOTO 
    $q = mysqli_prepare($koneksi, "SELECT foto FROM penulis WHERE id=?");
    mysqli_stmt_bind_param($q, "i", $id);
    mysqli_stmt_execute($q);
    $res = mysqli_stmt_get_result($q);
    $row = mysqli_fetch_assoc($res);
    
    $foto = $row['foto'] ?? 'default.png';

# HAPUS DATA 
$stmt = mysqli_prepare($koneksi, "DELETE FROM penulis WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {

# HAPUS FILE FOTO (JIKA BUKAN DEFAULT) 
    if ($foto != 'default.png' && file_exists("../uploads_penulis/" . $foto)) {
        unlink("../uploads_penulis/" . $foto);
    }

    echo json_encode([
        'status' => 'sukses'
    ]);

} else {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => 'Gagal menghapus data'
    ]);
}