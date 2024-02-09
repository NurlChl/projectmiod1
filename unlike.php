<?php

require 'koneksi.php';

$id_user = $_POST['id_user'];
$id_opini = $_POST['id_opini'];

$unlike = "DELETE FROM likes WHERE id_user = $id_user AND id_opini = $id_opini";
if ($conn->query($unlike) === TRUE) {
    $queryJumlahLike = "SELECT COUNT(*) as total_likes FROM likes WHERE id_opini = $id_opini";
    $hasilJumlahLike = $conn->query($queryJumlahLike);

    if ($hasilJumlahLike->num_rows > 0) {
        $row = $hasilJumlahLike->fetch_assoc();
        $total_likes = $row['total_likes'];

        $response = array('success' => true, 'like_count' => $total_likes);
        echo json_encode($response);
    } else {
        $response = array('success' => false, 'message' => 'gagal mengambil jumlah like terbaru');
        echo json_encode($response);
    }
} else {
    $response = array('success' => false, 'message' => 'gagal menghapus like');
    echo json_encode($response);
}

$conn->close();

?>