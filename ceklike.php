<?php

require 'koneksi.php';

$id_user = $_POST['id_user'];
$id_opini = $_POST['id_opini'];

$cekLikeQuery = "SELECT COUNT(*) as count FROM likes WHERE id_user = $id_user AND id_opini = $id_opini";
$result = $conn->query($cekLikeQuery);
$row = $result->fetch_assoc();
$already_liked = $row['count'] > 0;

echo json_encode(['already_liked' => $already_liked]);

$conn->close();

?>