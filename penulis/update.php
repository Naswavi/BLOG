<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../koneksi.php';
header('Content-Type: application/json');

/* Ambil data */
$id             = $_POST['id'] ?? '';
$nama_depan     = trim($_POST['nama_depan'] ?? '');
$nama_belakang  = trim($_POST['nama_belakang'] ?? '');
$username       = trim($_POST['username'] ?? '');
$password       = trim($_POST['password'] ?? '');

/* Validasi */
if (
    empty($id) ||
    empty($nama_depan) ||
    empty($nama_belakang) ||
    empty($username)
) {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => 'Data wajib diisi'
    ]);
    exit;
}

/* Ambil data lama */

$cek = mysqli_query($koneksi, "SELECT * FROM penulis WHERE id = '$id'");

if (!$cek || mysqli_num_rows($cek) == 0) {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => 'Data tidak ditemukan'
    ]);
    exit;
}

$dataLama = mysqli_fetch_assoc($cek);
$foto = $dataLama['foto'];

/* Upload foto baru jika ada */

if (
    isset($_FILES['foto']) &&
    $_FILES['foto']['error'] == 0
) {
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    $ext = strtolower(
        pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION)
    );

    if (!in_array($ext, $allowed)) {
        echo json_encode([
            'status' => 'gagal',
            'pesan' => 'Format foto tidak valid'
        ]);
        exit;
    }

    $namaBaru = time() . "_" . basename($_FILES['foto']['name']);
    $tujuan = "../uploads_penulis/" . $namaBaru;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $tujuan)) {

        if (
            !empty($foto) &&
            $foto != 'default.png' &&
            file_exists("../uploads_penulis/" . $foto)
        ) {
            unlink("../uploads_penulis/" . $foto);
        }

        $foto = $namaBaru;
    }
}

/* Jika password diisi → update password */

if (!empty($password)) {

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = "
        UPDATE penulis SET
            nama_depan = ?,
            nama_belakang = ?,
            username = ?,
            password = ?,
            foto = ?
        WHERE id = ?
    ";

    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "sssssi",
        $nama_depan,
        $nama_belakang,
        $username,
        $password_hash,
        $foto,
        $id
    );

} else {

    $query = "
        UPDATE penulis SET
            nama_depan = ?,
            nama_belakang = ?,
            username = ?,
            foto = ?
        WHERE id = ?
    ";

    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssi",
        $nama_depan,
        $nama_belakang,
        $username,
        $foto,
        $id
    );
}

/* Eksekusi */

if (mysqli_stmt_execute($stmt)) {
    echo json_encode([
        'status' => 'sukses',
        'pesan' => 'Data berhasil diupdate'
    ]);
} else {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => mysqli_error($koneksi)
    ]);
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
exit;
?>