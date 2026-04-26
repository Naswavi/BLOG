<?php
require_once '../koneksi.php';
header('Content-Type: application/json');

$id = $_POST['id'] ?? 0;

$query = "
  SELECT *
  FROM artikel
  WHERE id = ?
";

$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

echo json_encode($data);