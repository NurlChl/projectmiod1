<?php

session_start();
require "koneksi.php";
require_once "navbar.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION["posisi"] === "user") {
    header("Location: index.php");
    exit;
}

$id_buku = $_GET['id_buku'];
$buku = query("SELECT * FROM buku WHERE id_buku = $id_buku")[0];

if (isset($_POST["editBukuIni"])) {
    
    if (editBuku($_POST) > 0 ) {
        echo "
            <script>
                alert('buku berhasil diubah')
                document.location.href = './buku.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('buku gagal diubah')
            </script>
        ";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="edit_buku.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        form div img {
            width: 10rem;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Tambah Buku</h2>
        <input type="hidden" name="id_buku" value="<?= $buku['id_buku'] ?>">
        <input type="hidden" name="gambarBukuLama" value="<?= $buku['gambar_buku'] ?>">
        <div>
            <label for="judul_buku">Judul Buku</label>
            <input type="text" name="judul_buku" id="judul_buku" required value="<?= $buku['judul_buku'] ?>">
        </div>
        <div>
            <label for="written_by">Nama Penulis</label>
            <input type="text" name="written_by" id="written_by" required value="<?= $buku['written_by'] ?>">
        </div>
        <div>
            <label for="publish_by">Di Publikiasi Oleh</label>
            <input type="text" name="publish_by" id="publish_by" required value="<?= $buku['publish_by'] ?>">
        </div>
        <div>
            <label for="tgl_rilis">Tanggal Rilis</label>
            <input type="date" name="tgl_rilis" id="tgl_rilis" value="<?= $buku['tgl_rilis'] ?>">
        </div>
        <div>
            <label for="genre">Genre Buku</label>
            <input type="text" name="genre" id="genre" required value="<?= $buku['genre'] ?>">
        </div>
        <div>
            <label for="pages">Banyak Halaman</label>
            <input type="number" name="pages" id="pages" value="<?= $buku['pages'] ?>"> 
        </div>
        <div>
            <label for="isbn">ISBN</label>
            <input type="number" name="isbn" id="isbn" value="<?= $buku['isbn'] ?>">
        </div>
        <div>
            <label for="quotes">Trailer Singkat</label>
            <textarea name="quotes" id="quotes" placeholder="Masukkan trailer tentang buku tersebut" required><?= $buku['quotes'] ?></textarea>
        </div>
        <div>
            <label for="deskripsi_buku">Deskripsi Buku</label>
            <textarea name="deskripsi_buku" id="deskripsi_buku" placeholder="Masukkan deskripsi buku" required><?= $buku['deskripsi_buku'] ?></textarea>
        </div>
        <div>
            <label for="gambar_buku">Cover Buku</label>
            <img src="./gambar_buku/<?= $buku['gambar_buku'] ?>">
            <input type="file" name="gambar_buku" id="gambar_buku" accept="image/*">
        </div>
        <div>
            <label for="link_pembelian">Link Pembelian</label>
            <input type="text" name="link_pembelian" id="link_pembelian" placeholder="Masukkan jika ada" value="<?= $buku['link_pembelian'] ?>">
        </div>

        <button type="submit" name="editBukuIni">Tambah Buku</button>
    </form>
</body>
</html>