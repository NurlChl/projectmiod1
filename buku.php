<?php

session_start();

require_once 'navbar.php';
require 'koneksi.php';


$buku = query("SELECT * FROM buku ORDER BY id_buku DESC");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <link rel="stylesheet" href="buku.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .sec-buku .luar-buku .list-buku {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(10rem, 1fr));
            width: 100%;
            gap: 3rem;
            justify-items: center;
        }

        .sec-buku .luar-buku .list-buku .buku img {
            max-width: 11rem;
            object-fit: contain;
            cursor: pointer;
        }
        .sec-buku .share-buku .tambah-buku {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sec-buku .share-buku .tambah-buku button {
            padding: .5rem 1rem;
            border: none;
            border-radius: .5rem;
            background-color: blue;
            color: white;
            cursor: pointer;
        }




        @media (max-width: 550px) {
            .sec-buku .luar-buku .list-buku {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(8rem, 1fr));
                width: 100%;
                gap: 1rem;
                justify-items: center;
            }

            .sec-buku .luar-buku .list-buku .buku img {
                max-width: 8rem;
                object-fit: contain;
                cursor: pointer;
            }

        }
    </style>
</head>
<body>
    <section class="sec-buku">
        <div class="luar-buku">
            <h2>Buku</h2>
            <div class="list-buku">
                <?php foreach ($buku as $buku): ?>
                <div class="buku">
                    <a href="./detailBuku.php?id_buku=<?= $buku['id_buku'] ?>">
                        <img src="gambar_buku/<?= $buku['gambar_buku'] ?>"/>
                    </a>
                    <a href="./detailBuku.php?id_buku=<?= $buku['id_buku'] ?>">
                        <button>Lihat Buku</button>
                    </a>
                </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="share-buku">
            <?php
            if (isset($_SESSION['posisi'])) {
                if ($_SESSION['posisi'] === 'admin') {
            ?>
            <div class="tambah-buku">
                <a href="./tambahBuku.php">
                    <button>Tambah Buku</button>
                </a>
            </div>
            <?php }} ?>
            <p>Share</p>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.puthutea.com/" target="_blank">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url=https://www.puthutea.com/&text=Check out this awesome website" target="_blank">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="whatsapp://send?text=Kunjungi Link Website Berikut: https://www.puthutea.com/" data-action="share/whatsapp/share">
                <i class="fa fa-whatsapp"></i>
            </a>
        </div>

    </section>

    <?php include_once 'footer.php' ?>
</body>
</html>