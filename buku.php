<?php

session_start();

require_once 'navbar.php';
require 'koneksi.php';


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
</head>
<body>
    <section class="sec-buku">
        <div class="luar-buku">
            <h2>Buku</h2>
            <div class="list-buku">
                <div class="buku">
                    <img src="gambar_buku/kupu-kupubersayap.jpg"/>
                    <button>Lihat Buku</button>
                </div>
                <div class="buku">
                    <img src="gambar_buku/kupu-kupubersayap.jpg"/>
                    <button>Lihat Buku</button>
                </div>
                <div class="buku">
                    <img src="gambar_buku/kupu-kupubersayap.jpg"/>
                    <button>Lihat Buku</button>
                </div>
                <div class="buku">
                    <img src="gambar_buku/kupu-kupubersayap.jpg"/>
                    <button>Lihat Buku</button>
                </div>
                <div class="buku">
                    <img src="gambar_buku/kupu-kupubersayap.jpg"/>
                    <button>Lihat Buku</button>
                </div>
                <div class="buku">
                    <img src="gambar_buku/kupu-kupubersayap.jpg"/>
                    <button>Lihat Buku</button>
                </div>
                <div class="buku">
                    <img src="gambar_buku/kupu-kupubersayap.jpg"/>
                    <button>Lihat Buku</button>
                </div>
                <div class="buku">
                    <img src="gambar_buku/kupu-kupubersayap.jpg"/>
                    <button>Lihat Buku</button>
                </div>
            </div>
        </div>

        <div class="share-buku">
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