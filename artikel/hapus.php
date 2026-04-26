<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

$id = $_POST['id'] ?? 0;

// ambil nama gambar dulu
$q = mysqli_query($koneksi, "SELECT gambar FROM artikel WHERE id='$id'");
$data = mysqli_fetch_assoc($q);
$gambar = $data['gambar'];

// hapus data
$hapus = mysqli_query($koneksi, "DELETE FROM artikel WHERE id='$id'");

if ($hapus) {

    // hapus file gambar
    if ($gambar && file_exists("../uploads_artikel/".$gambar)) {
        unlink("../uploads_artikel/".$gambar);
    }

    echo json_encode(["status" => "sukses"]);

} else {
    echo json_encode([
        "status" => "error",
        "pesan" => mysqli_error($koneksi)
    ]);
}