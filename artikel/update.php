<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$id_kategori = $_POST['kategori_id'];
$id_penulis = $_POST['penulis_id'];

$namaFile = '';

// kalau upload gambar baru
if (!empty($_FILES['gambar']['name'])) {

    $namaFile = uniqid() . '.png';
    $path = "../uploads_artikel/" . $namaFile;

    move_uploaded_file($_FILES['gambar']['tmp_name'], $path);

    $query = mysqli_query($koneksi, "
        UPDATE artikel SET 
        id_kategori='$id_kategori',
        id_penulis='$id_penulis',
        judul='$judul',
        isi='$isi',
        gambar='$namaFile'
        WHERE id='$id'
    ");

} else {

    $query = mysqli_query($koneksi, "
        UPDATE artikel SET 
        id_kategori='$id_kategori',
        id_penulis='$id_penulis',
        judul='$judul',
        isi='$isi'
        WHERE id='$id'
    ");
}

if ($query) {
    echo json_encode(["status" => "sukses"]);
} else {
    echo json_encode([
        "status" => "error",
        "pesan" => mysqli_error($koneksi)
    ]);
}