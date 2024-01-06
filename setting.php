<?php

require_once 'navbar.php';
require 'koneksi.php';

$opini = query("SELECT * FROM opini ORDER BY id_opini DESC");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <link rel="stylesheet" href="setting.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
          document.addEventListener("DOMContentLoaded", function() {
            addEllipsisToClass("isi");
        });

        function addEllipsisToClass(className) {
            var elements = document.getElementsByClassName(className);

            for (var i = 0; i < elements.length; i++) {
                var element = elements[i];
                var lineHeight = parseInt(window.getComputedStyle(element).lineHeight);
                var maxLines = 1; 
                var maxHeight = lineHeight * maxLines;

                if (element.clientHeight > maxHeight) {
                    while (element.clientHeight > maxHeight) {
                        element.innerHTML = element.innerHTML.slice(0, -1);
                    }
                    element.innerHTML += "...";
                }
            }
        }
    </script>
</head>
<body>
    <section class="setting">
        <div class="search">
            <h1>Setting</h1>
            <ul>
                <input type="search" name="search" placeholder="Cari...">
                <button type="submit" name="btn-search">Cari</button>
            </ul>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Isi</th>
                    <th>Penulis</th>
                    <th>Tgl dibuat</th>
                    <th>Terakhir diubah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($opini as $opini) : ?>
                <tr>
                    <td><?= $opini['judul'] ?></td>
                    <td><?= $opini['kategori'] ?></td>
                    <td>
                        <p class="isi"><?= $opini['isi_opini'] ?></p>
                    </td>       
                    <td><?= $opini['penulis'] ?></td>
                    <td><?= $opini['tgl_buat'] ?></td>
                    <td><?= $opini['tgl_ubah'] ?></td>
                    <td>
                        <div>
                            <a href="editOpini.php?id_opini=<?= $opini['id_opini'] ?>">
                                <button type="submit" name="editOpini" class="edit">Edit</button>
                            </a>
                            <a href="hapusOpini.php?id_opini=<?= $opini['id_opini'] ?>" onclick="
                                    return confirm('yakin?');">
                            <button type="submit" name="hapusOpini" class="hapus">Hapus</button>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>

    <?php include_once 'footer.php' ?>
</body>
</html>