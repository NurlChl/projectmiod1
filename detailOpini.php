<?php

session_start();

require 'koneksi.php';
include_once 'navbar.php';

$id_opini = $_GET['id_opini'];
$nama_komen = $_SESSION['username'];


$opini = query("SELECT * FROM opini WHERE id_opini = $id_opini")[0];
$opiniTerbaru = query("SELECT * FROM opini ORDER BY id_opini DESC");
$komentar = query("SELECT * FROM komen WHERE id_opini = $id_opini ORDER BY id_komen DESC");
$banyakKOmen = query("SELECT COUNT(*) as jumlah FROM komen WHERE id_opini = $id_opini")[0];

$user = query("SELECT id_user FROM users WHERE username = '$nama_komen'")[0];
$id_user = $user['id_user'];
$banyakLike = query("SELECT COUNT(*) as banyak_like FROM likes WHERE id_opini = $id_opini")[0];


$format_tgl = new \IntlDateFormatter('id_ID', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
$format_tgl->setPattern('MMMM d, y');




if (isset($_POST["kirim_komen"])) {
    
    if (tambahKomen($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil dibuat')
                document.location.href = './detailOpini.php?id_opini=$id_opini'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal dibuat')
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
    <title><?= $opini['judul'] ?></title>
    <link rel="stylesheet" href="detail_opini.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.tambah-komen').hide();
            $('#pencet-like').removeClass('liked');

            $('#btn-komen').click(function() {
                $('.tambah-komen').toggle();
            })

            $.ajax({
               url: 'ceklike.php',
               type: 'POST',
               data: {id_user: <?= $id_user ?>, id_opini: <?= $id_opini ?>},
               dataType: 'json',
               success: function(response) {
                    if (response.already_liked) {
                        $('#pencet-like').hide();
                        $('#pencet-unlike').show();
                    } else {
                        $('#pencet-like').show();
                        $('#pencet-unlike').hide();
                    }
               },
               error: function(xhr, status, error) {
                    console.error("Error: " + error);
               }
            });
            
        })
    </script>

    <script>

        if (screenWidth > 950) {
            document.addEventListener('DOMContentLoaded', function() {
                var navbarHeight = document.querySelector('.opini-terbaru').offsetHeight;
    
                document.getElementById('myContainer').style.height = navbarHeight + 'px';
            });
        }

        if (screenWidth <= 950) {
            document.getElementById('myContainer').style.height = 'fit-content';
        }
    </script>

    <style>
        .bungkus-section .detail .detail-opini .komen li .material-symbols-rounded.liked {
            color: red;
            font-variation-settings:
            'FILL' 1,
            'wght' 400,
            'GRAD' -25,
            'opsz' 20
        }
    </style>
    
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
                        <p class="material-symbols-rounded btn-komen" id="btn-komen">comment</p>
                        <p class="t-komen"><?= $banyakKOmen['jumlah'] ?> Comment</p>
                    </li>
                    <li class="baris"></li>
                    <li>
                        <p class="angka-like" id="angka-like"><?= $banyakLike['banyak_like'] ?></p>
                        <p class="material-symbols-rounded" id="pencet-like" onclick="likeOpini()">favorite</p>
                        <p class="material-symbols-rounded liked" id="pencet-unlike" onclick="unlikeOpini()">favorite</p>
                    </li>
                    <li class="baris"></li>
                    <li class="share-sosmed">
                        <span class="fa fa-facebook-f"></span>
                        <span class="fa fa-twitter"></span>
                        <span class="fa fa-whatsapp"></span>
                    </li>
                </ul>
            </div>

            <div class="tambah-komen">
                <?php if (isset($_SESSION["login"])) : ?>
                <form class="input-komen" method="post" action="">
                    <input type="hidden" name="id_opini" value="<?= $id_opini ?>">
                    <input type="hidden" name="nama_komen" value="<?= $nama_komen ?>">
                    <textarea name="isi_komen" id="isi_komen" placeholder="Masukkan Komentar"></textarea>
                    <button type="submit" name="kirim_komen">Kirim</button>
                </form>
                <?php else : ?>
                <form class="input-komen">
                    <p style="color: red; font-size: .9rem;">! login untuk mengaktifkan fitur komen</p>
                </form>
                <?php endif ?>
                <div class="isi_komen">
                    <?php foreach ($komentar as $komentar) : ?>
                    <div class="kotak-komen">
                        <li>
                            <h4><?= $komentar['nama_komen'] ?></h4>
                            <p><?= $format_tgl->format(strtotime($komentar['tgl_buat_komen']))  ?></p>
                        </li>
                        <p class="tempat-komen"><?= $komentar['isi_komen'] ?></p>
                    </div>
                    <?php endforeach ?>
                </div>
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
                        <a href="detailOpini.php?id_opini=<?= $opiniTerbaru['id_opini'] ?>">
                            <h1><?= $opiniTerbaru['judul'] ?></h1>
                        </a>
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

    <script>
        function likeOpini() {
            var id_user = <?= $id_user ?>;
            var id_opini = <?= $id_opini ?>;

            $.ajax({
                url: 'like.php',
                type: 'POST',
                data: {id_user: id_user, id_opini: id_opini},
                success: function(response) {
                    location.reload();
                    $('#pencet-like').hide();
                    $('#pencet-unlike').show();
                    // console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }

        function unlikeOpini() {
            var id_user = <?= $id_user ?>;
            var id_opini = <?= $id_opini ?>;

            $.ajax({
                url: 'unlike.php',
                type: 'POST',
                data: {id_user: id_user, id_opini: id_opini},
                success: function(response) {
                    location.reload();
                    $('#pencet-like').show();
                    $('#pencet-unlike').hide();
                    // console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }
    </script>

    <?php include_once 'footer.php' ?>

</body>
</html>