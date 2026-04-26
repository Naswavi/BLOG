<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../koneksi.php';
header('Content-Type: application/json');

/*
|--------------------------------------------------------------------------
| Ambil data dari form
|--------------------------------------------------------------------------
*/

$nama_depan    = trim($_POST['nama_depan'] ?? '');
$nama_belakang = trim($_POST['nama_belakang'] ?? '');
$username      = trim($_POST['username'] ?? '');
$password      = trim($_POST['password'] ?? '');

/*
|--------------------------------------------------------------------------
| Validasi wajib isi
|--------------------------------------------------------------------------
*/

if (
    empty($nama_depan) ||
    empty($nama_belakang) ||
    empty($username) ||
    empty($password)
) {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => 'Semua field wajib diisi'
    ]);
    exit;
}

/*
|--------------------------------------------------------------------------
| Hash password
|--------------------------------------------------------------------------
*/

$password_hash = password_hash($password, PASSWORD_BCRYPT);

/*
|--------------------------------------------------------------------------
| Folder upload
|--------------------------------------------------------------------------
*/

$folder = "../uploads_penulis/";

if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

/*
|--------------------------------------------------------------------------
| Default foto
|--------------------------------------------------------------------------
*/

$nama_file = "default.png";

/*
|--------------------------------------------------------------------------
| Jika upload foto
|--------------------------------------------------------------------------
*/

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
            'pesan' => 'Format file harus JPG, JPEG, PNG, atau GIF'
        ]);
        exit;
    }

    if ($_FILES['foto']['size'] > 2 * 1024 * 1024) {
        echo json_encode([
            'status' => 'gagal',
            'pesan' => 'Ukuran file maksimal 2MB'
        ]);
        exit;
    }

    $nama_file = time() . "_" . basename($_FILES['foto']['name']);
    $tujuan = $folder . $nama_file;

    if (!move_uploaded_file($_FILES['foto']['tmp_name'], $tujuan)) {
        echo json_encode([
            'status' => 'gagal',
            'pesan' => 'Gagal upload foto'
        ]);
        exit;
    }
}

/*
|--------------------------------------------------------------------------
| Cek username sudah ada atau belum
|--------------------------------------------------------------------------
*/

$cek = mysqli_prepare(
    $koneksi,
    "SELECT id FROM penulis WHERE username = ?"
);

mysqli_stmt_bind_param($cek, "s", $username);
mysqli_stmt_execute($cek);
$result = mysqli_stmt_get_result($cek);

if (mysqli_num_rows($result) > 0) {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => 'Username sudah digunakan'
    ]);
    exit;
}

/*
|--------------------------------------------------------------------------
| Simpan ke database
|--------------------------------------------------------------------------
*/

$stmt = mysqli_prepare(
    $koneksi,
    "INSERT INTO penulis 
    (nama_depan, nama_belakang, username, password, foto)
    VALUES (?, ?, ?, ?, ?)"
);

if (!$stmt) {
    echo json_encode([
        'status' => 'gagal',
        'pesan' => mysqli_error($koneksi)
    ]);
    exit;
}

mysqli_stmt_bind_param(
    $stmt,
    "sssss",
    $nama_depan,
    $nama_belakang,
    $username,
    $password_hash,
    $nama_file
);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode([
        'status' => 'sukses',
        'pesan' => 'Data berhasil disimpan'
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