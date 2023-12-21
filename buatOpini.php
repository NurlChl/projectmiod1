<?php

require 'koneksi.php';

if (isset($_POST["simpan"])) {

    

    if (tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan')
                document.location.href = 'index.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan')
            </script>
        ";
    }
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Opini</title>
    <link rel="stylesheet" href="buat_opini.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tiny.cloud/1/xew3fiz6muk1txs3fhfjrqtw1kceo01q6tphuhqhn2cth34o/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#isi_opini',
            plugins: 'image link',
            toolbar: 'bold italic underline | image link',
            image_uploadtab: true,
            images_upload_url: 'URL_UNGGAH_GAMBAR',
            branding: false
        });
    </script>

    <style>
        .tox-statusbar, .tox-notification--in { 
            display: none !important;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Buat Opini</h1>

        <div>
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" />
        </div>

        <div>
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" id="kategori" value="Uncategories" />
        </div>

        <div>
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" />
        </div>

        <div>
            <label for="gambar">Cover Opini</label>
            <input type="file" name="gambar" id="gambar" />
        </div>
        
        <div>
            <label for="isi_opini">Opini</label>
            <textarea name="isi_opini" id="isi_opini" placeholder="Masukkan opini anda"></textarea>
        </div>

        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>