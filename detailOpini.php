<?php

session_start();

require 'koneksi.php';
include_once 'navbar.php';

$id_opini = $_GET['id_opini'];

$opini = query("SELECT * FROM opini WHERE id_opini = $id_opini")[0];
$opiniTerbaru = query("SELECT * FROM opini ORDER BY id_opini DESC");


$format_tgl = new \IntlDateFormatter('id_ID', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
$format_tgl->setPattern('MMMM d, y');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="detail_opini.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var navbarHeight = document.querySelector('.opini-terbaru').offsetHeight;

            document.getElementById('myContainer').style.height = navbarHeight + 'px';
        });
    </script>
    
</head>

    
</head>
<body>
    <div class="bungkus-section" id="myContainer">
        <section class="detail">
            <div class="detail-opini">
                <h1><?= $opini['judul'] ?></h1>
                <ul class="tgl">
                    <p>written by <span><?= $opini['penulis'] ?></span></p>
                    <p>|</p>
                    <p><?= $format_tgl->format(strtotime($opini['tgl_buat']))  ?></p>
                </ul>
                <img src="gambar/<?= $opini['gambar'] ?>"/>
                <p><?= nl2br($opini['isi_opini']) ?></p>
                <ul class="komen">
                    <li>
                        <p class="material-symbols-rounded">comment</p>
                        <p class="t-komen">0 Comment</p>
                    </li>
                    <li class="baris"></li>
                    <li>
                        <p class="angka-like">2</p>
                        <p class="material-symbols-rounded">favorite</p>
                    </li>
                    <li class="baris"></li>
                    <li class="share-sosmed">
                        <span class="fa fa-facebook-f"></span>
                        <span class="fa fa-twitter"></span>
                        <span class="fa fa-whatsapp"></span>
                    </li>
                </ul>
            </div>


            <div class="bungkus-rekom">
                <h2>Rekomendasi</h2>
                <div class="rekomendasi">
                    <div class="konten-slider">
                        <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg"/>
                        <h2>Pinjam Hape</h2>
                        <p>Januari 2, 2019</p>
                    </div>
                    <div class="konten-slider">
                        <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg"/>
                        <h2>Pinjam Hape</h2>
                        <p>Januari 2, 2019</p>
                    </div>
                    <div class="konten-slider">
                        <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg"/>
                        <h2>Pinjam Hape</h2>
                        <p>Januari 2, 2019</p>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="terbaru">
            <div class="opini-terbaru">
                <?php foreach ($opiniTerbaru as $opiniTerbaru) : ?>
                <div>
                    <img src="gambar/<?= $opiniTerbaru['gambar'] ?>"/>
                    <ul>
                        <h1><?= $opiniTerbaru['judul'] ?></h1>
                        <?php
                            
                            $tglBuatTerbaru = strtotime($opiniTerbaru['tgl_buat']);
                            $formatTglTerbaru = $format_tgl->format($tglBuatTerbaru);

                            
                        ?>
                        <p><?= $formatTglTerbaru ?></p>
                    </ul>
                </div>
                <?php endforeach ?>
            </div>
        </section>
    </div>

    <?php include_once 'footer.php' ?>

    <script>
        $('.rekomendasi').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '<button class="kiri"><</button>',
        nextArrow: '<button class="kanan">></button>',
        });
    </script>

</body>
</html>