<?php

session_start();


require "koneksi.php";
require_once "navbar.php";



$id_buku = $_GET['id_buku'];

$buku = query("SELECT * FROM buku WHERE id_buku = $id_buku")[0];

$format_tgl = new \IntlDateFormatter('id_ID', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
$format_tgl->setPattern('MMMM d, y');


$format_rilis = new \IntlDateFormatter('id_ID', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
$format_rilis ->setPattern('d MMMM y');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <link rel="stylesheet" href="detail-buku.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=BIZ+UDPMincho:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .detail-buku .luar-detail-buku {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            align-items: start;
        }
    </style>
</head>
<body>
    <section class="detail-buku">
        <div class="luar-detail-buku">
            <div class="bungkus-desc">
                <h2><?= $buku['judul_buku'] ?></h2>
                <ul class="desc">
                    <li>written by <span><?= $buku['written_by'] ?></span></li>
                    <li>|</li>
                    <?php
                        
                        $tglUp = strtotime($buku['tgl_up']);
                        $formatTgl = $format_rilis->format($tglUp);

                        
                        ?>
                    <li><?= $formatTgl ?></li>
                </ul>
            </div>
            <div class="isi-detail">
                <img src="gambar_buku/<?= $buku['gambar_buku'] ?>">
                <div class="dalam-detail">
                    <ul class="keterangan">
                        <li>
                            <p class="bold">Title:</p>
                            <p><?= $buku['judul_buku'] ?></p>
                        </li>
                        <li>
                            <p class="bold">Published by:</p>
                            <p><?= $buku['publish_by'] ?></p>
                        </li>
                        <?php
                        $tlgRilis = strtotime($buku['tgl_rilis']);
                        $formatRilis = $format_rilis->format($tlgRilis);

                        ?>
                        <li>
                            <p class="bold">Release Date:</p>
                            <p><?= $formatRilis ?></p>
                        </li>
                        <li>
                            <p class="bold">Genre:</p>
                            <p><?= $buku['genre'] ?></p>
                        </li>
                        <li>
                            <p class="bold">Pages:</p>
                            <p><?= $buku['pages'] ?></p>
                        </li>
                    </ul>
                    <ul class="quotes">
                        <div>"</div>
                        <p><?= $buku['quotes'] ?></p>
                    </ul>
                </div>
            </div>
            <div class="bawah-detail">
                <a href="<?= $buku['link_pembelian'] ?>" target="_blank">Beli Sekarang</a>
                <p><?= $buku['deskripsi_buku'] ?></p>

                <?php
                if (isset($_SESSION['posisi'])) {

                if ($_SESSION['posisi'] === 'admin') {

                ?>
                <div class="aksi">
                    <a href="editBuku.php?id_buku=<?= $id_buku ?>">
                        <button class="edit">Edit</button>
                    </a>
                    <a href="hapusBuku.php?id_buku=<?= $id_buku ?>" onclick="return confirm('yakin?');">
                        <button class="hapus">Hapus</button>
                    </a>
                </div>
                <?php }} ?>
            </div>
            <div class="share">
                <ul>
                    <!-- <li class="tombol-komen">
                        <i></i>
                        <p><span>0</span> komen</p>
                    </li> -->
                    <li class="medsos">
                        <p>SHARE</p>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.puthutea.com/" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=https://www.puthutea.com/&text=Check out this awesome website" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="whatsapp://send?text=Kunjungi Link Website Berikut: https://www.puthutea.com/" data-action="share/whatsapp/share">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div class="terbaru">
            <ul>
                <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg">
                <li>
                    <h4>11 Penasihat pornomo</h4>
                    <p>Maret 21, 2026</p>
                </li>
            </ul>
            <ul>
                <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg">
                <li>
                    <h4>11 Penasihat pornomo</h4>
                    <p>Maret 21, 2026</p>
                </li>
            </ul>
            <ul>
                <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg">
                <li>
                    <h4>11 Penasihat pornomo</h4>
                    <p>Maret 21, 2026</p>
                </li>
            </ul>
        </div> -->
    </section>

    <?php include_once "footer.php" ?>
</body>
</html>