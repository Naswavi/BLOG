<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$judul = $_POST['judul'] ?? '';
$isi = $_POST['isi'] ?? '';
$id_kategori = $_POST['kategori_id'] ?? '';
$id_penulis = $_POST['penulis_id'] ?? '';

/* VALIDASI INPUT */

if (!$judul || !$isi || !$id_kategori || !$id_penulis) {
    echo json_encode([
        "status" => "error",
        "pesan" => "Semua field wajib diisi"
    ]);
    exit;
}

/* VALIDASI GAMBAR */

if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] != 0) {
    echo json_encode([
        "status" => "error",
        "pesan" => "Gambar wajib diupload"
    ]);
    exit;
}

/* FORMAT TANGGAL */

date_default_timezone_set('Asia/Jakarta');

$hari = [
    'Minggu',
    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu'
];

$bulan = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
];

$now = new DateTime();

$hari_tanggal =
    $hari[$now->format('w')] . ", " .
    $now->format('j') . " " .
    $bulan[(int)$now->format('n')] . " " .
    $now->format('Y') . " | " .
    $now->format('H:i');

/* UPLOAD GAMBAR */

$folder = "../uploads_artikel/";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

$ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
$ext = strtolower($ext);

if (!$ext) {
    $ext = "png";
}

$namaFile = uniqid() . "." . $ext;
$path = $folder . $namaFile;

if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $path)) {
    echo json_encode([
        "status" => "error",
        "pesan" => "Upload gambar gagal"
    ]);
    exit;
}

/* INSERT DATABASE (PREPARED STATEMENT) */

$stmt = mysqli_prepare(
    $koneksi,
    "INSERT INTO artikel 
    (judul, isi, id_kategori, id_penulis, hari_tanggal, gambar)
    VALUES (?, ?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "ssiiss",
    $judul,
    $isi,
    $id_kategori,
    $id_penulis,
    $hari_tanggal,
    $namaFile
);

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

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>