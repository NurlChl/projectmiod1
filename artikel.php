<?php

session_start();

require_once "navbar.php";
require 'koneksi.php';

$opini = query("SELECT * FROM opini");
$opiniTerbaru = query("SELECT * FROM opini ORDER BY id_opini DESC");

$format_tgl = new \IntlDateFormatter('id_ID', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
$format_tgl->setPattern('MMMM d, y');

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artikel</title>
  <link rel="stylesheet" href="artikel.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script>

        document.addEventListener("DOMContentLoaded", function() {
            addEllipsisToClass("text-ellipsis");
        });

        function addEllipsisToClass(className) {
            var elements = document.getElementsByClassName(className);

            for (var i = 0; i < elements.length; i++) {
                var element = elements[i];
                var lineHeight = parseInt(window.getComputedStyle(element).lineHeight);
                var maxLines = 2; // Sesuaikan dengan jumlah baris maksimum yang diinginkan
                var maxHeight = lineHeight * maxLines;

                // Tentukan jumlah maksimum karakter berdasarkan indeks nth-child
                var index = i + 1;
                var maxCharacters = 0;

                // Tentukan jumlah maksimum karakter berdasarkan indeks nth-child
                if (index % 3 == 1) {
                    maxCharacters = 250;
                } else {
                    maxCharacters = 80;
                }

                // Batasi teks yang diproses hanya untuk teks yang melebihi batas karakter tertentu
                var text = element.textContent.trim().slice(0, maxCharacters);

                if (text.length < element.textContent.trim().length) {
                    element.textContent = text + "...";
                }
            }
        }


        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        if (screenWidth >= 950) {
            document.addEventListener('DOMContentLoaded', function() {
                var navbarHeight = document.querySelector('.artikel-terbaru').offsetHeight;

                document.getElementById('myContainer').style.height = navbarHeight + 'px';
            });
            
        }

        if (screenWidth < 950) {

                document.getElementById('myContainer').style.height = 'fit-content';
            
        }

        if (screenWidth > 500) {
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                document.getElementById("logo").style.height = "2.5rem";
                document.getElementById("logo").style.transitionProperty = "all";
                document.getElementById("logo").style.transitionDuration = ".2s";
                document.getElementById("logo").style.transitionTimingFunction = "ease-in";
                document.getElementById("navbar").style.boxShadow = " 0px 2px 2px 1px rgba(0,0,0,0.05)";
                document.getElementById("navbar").style.transitionProperty = "all";
                document.getElementById("navbar").style.transitionDuration = ".2s";
                document.getElementById("navbar").style.transitionTimingFunction = "ease-in";

            } else {
                document.getElementById("logo").style.height = "3.5rem";
                document.getElementById("navbar").style.boxShadow = "none";
            }
            }
            
        }

        if (screenWidth <= 500) {
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                document.getElementById("logo").style.height = "1.6rem";
                document.getElementById("logo").style.transitionProperty = "all";
                document.getElementById("logo").style.transitionDuration = ".2s";
                document.getElementById("logo").style.transitionTimingFunction = "ease-in";
                document.getElementById("navbar").style.boxShadow = " 0px 2px 2px 1px rgba(0,0,0,0.05)";
                document.getElementById("navbar").style.transitionProperty = "all";
                document.getElementById("navbar").style.transitionDuration = ".2s";
                document.getElementById("navbar").style.transitionTimingFunction = "ease-in";

            } else {
                document.getElementById("logo").style.height = "2rem";
                document.getElementById("navbar").style.boxShadow = "none";
            }
            }
            
        }
        
      </script>
    <style>
        .artikel-terbaru>h2 {
            text-align: center;
            font-size: 1.2rem;
            font-weight: 500;
            padding: .5rem;
            border: 5px double gray;
            border-radius: 0px 20px 0px 20px;
        }
    </style>

</head>
<body>
    <div class="container" id="myContainer">
        <div class="kotak-artikel">
            <?php foreach ($opini as $opini) : ?>
            <div class="artikel">
                <img src="./gambar/<?= $opini['gambar'] ?>" />
                <div>
                    <span class="kategori"><?= $opini['kategori'] ?></span>
                    <a href="detailOpini.php?id_opini=<?= $opini['id_opini'] ?>">
                        <h1><?= $opini['judul'] ?></h1>
                    </a>
                    <ul class="keterangan">
                        <p>by <span><?= $opini['penulis'] ?></span></p>
                        <p>|</p>
                        <?php
                        
                        $tglBuat = strtotime($opini['tgl_buat']);
                        $formatTgl = $format_tgl->format($tglBuat);

                        
                        ?>
                        <p><?= $formatTgl?></p>
                    </ul>
                    <span class="baris"></span>
                    <p class="text-ellipsis"><?= nl2br($opini['isi_opini']) ?></p>
                </div>
                <div class="bungkus-sosmed">
                    <ul class="komen">
                        <!-- <li class="material-symbols-rounded">maps_ugc</li> -->
                        <li>Share,</li>
                    </ul>
                    <ul>
                        <li class="baris"></li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.puthutea.com/" target="_blank">
                            <li class="fa fa-facebook"></li>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=https://www.puthutea.com/&text=Check out this awesome website" target="_blank">
                            <li class="fa fa-twitter"></li>
                        </a>
                        <a href="whatsapp://send?text=Kunjungi Link Website Berikut: https://localhost/projectmiod1/detailOpini.php?id_opini=<?= $opini['id_opini']?>" data-action="share/whatsapp/share">
                            <li class="fa fa-whatsapp"></li> 
                        </a>
                        <li class="baris"></li>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="artikel-terbaru">
            <!-- <h2 style="border: 5px double gray; border-radius: 0px 20px 0px 20px;">TERBARU</h2> -->
            <h2>TERBARU</h2>
            <?php foreach ($opiniTerbaru as $opiniTerbaru) : ?>
            <div>
                <ul>
                    <div>
                        <img src="./gambar/<?= $opiniTerbaru['gambar'] ?>" />
                        <li>
                            <a href="detailOpini.php?id_opini=<?= $opiniTerbaru['id_opini'] ?>">
                                <h1><?= $opiniTerbaru['judul'] ?></h1>
                            </a>
                            <?php
                            
                            $tglBuatTerbaru = strtotime($opiniTerbaru['tgl_buat']);
                            $formatTglTerbaru = $format_tgl->format($tglBuatTerbaru);
                            
                            ?>
                            <p><?= $formatTglTerbaru ?></p>
                        </li>
                    </div>
                </ul>
            </div>
            <?php endforeach ?>
        </div>
    </div>

    <?php include_once "footer.php" ?>

</body>
</html>
