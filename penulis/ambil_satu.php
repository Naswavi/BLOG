<?php
require_once '../koneksi.php';

$id = $_POST['id'];

$stmt = mysqli_prepare($koneksi, "SELECT * FROM penulis WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

echo json_encode($data);