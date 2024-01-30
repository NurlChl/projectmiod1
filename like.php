<?php

session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['login'])) {
    echo 'not_logged_in';
    exit;
}

// require 'koneksi.php';

// // Koneksi ke database

// if ($conn->connect_error) {
//     die('Connection failed: ' . $conn->connect_error);
// }

// // Ambil data dari permintaan Ajax
// $id_opini = $_POST['id_opini'];
// $username = $_SESSION['username'];

// $ambilId = $query("SELECT id_user FROM users WHERE username = '$username'")[0];

// $id_user = $ambilId['id_user'];

// // Periksa apakah pengguna sudah "like" atau "unlike" posting sebelumnya
// $result = $conn->query("SELECT * FROM likes WHERE id_user = $id_user AND id_opini = $id_opini");

// if ($result->num_rows > 0) {
//     // Jika sudah "like" atau "unlike", hapus dari database
//     $conn->query("DELETE FROM likes WHERE id_user = $id_user AND id_opini = $id_opini");
//     echo 'unliked';
// } else {
//     // Jika belum "like" atau "unlike", tambahkan ke database
//     $conn->query("INSERT INTO likes (id_user, id_opini) VALUES ($id_user, $id_opini)");
//     echo 'liked';
// }

// // Tutup koneksi
// $conn->close();


require 'koneksi.php';

$id_opini = $_POST['id_opini'];
$id_user = $_POST['id_user'];
$status = $_POST['status'];

$ratings = mysqli_query($conn, "SELECT * FROM likes WHERE id_opini = $id_opini AND id_user = $id_user");
if (mysqli_num_rows($ratings) > 0){
    $rating = mysqli_fetch_assoc($ratings);
    if ($rating['status'] == $status){
        mysqli_query($conn, "DELETE FROM likes WHERE id_opini = $id_opini AND id_user = $id_user");
        echo "delete" . $status;
    }
}else {
    mysqli_query($conn, "INSERT INTO likes id_user, id_opini, status VALUES ($id_user, $id_opini, '$status')");
    echo "new" . $status;
}

?>
