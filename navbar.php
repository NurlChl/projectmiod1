<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="coba.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .active {
            color: #C06944
        }
    </style>

    <script>

        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        // Ubah responsivitas berdasarkan lebar layar
        if (screenWidth > 950) {
            document.addEventListener('DOMContentLoaded', function() {
                var navbarHeight = document.querySelector('.artikel-terbaru').offsetHeight;

                document.getElementById('myContainer').style.height = navbarHeight + 'px';
            });
            
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
                document.getElementById("logo").style.height = "1.5rem";
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
</head>
<body>
    <nav id="navbar">
        <a href="tentang.php">
            <img src="gambar/logoustajahcrop.png" id="logo"/>
        </a>

        <ul>
            <a href="index.php">
                <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class=active'; ?>>HOME</li>
            </a>
            <!-- <li>OPINI</li> -->
            <!-- <li>BAHASA ARAB</li> -->
            <!-- <a href="tentang.php">
                <li <?php if (strpos($_SERVER['PHP_SELF'], 'tentang.php')) echo 'class=active'; ?>>TENTANG</li>
            </a> -->
            <a href="artikel.php">
                <li <?php if (strpos($_SERVER['PHP_SELF'], 'artikel.php')) echo 'class=active'; ?>>ARTIKEL</li>
            </a>
            <a href="buku.php">
                <li <?php if (strpos($_SERVER['PHP_SELF'], 'buku.php')) echo 'class=active'; ?>>BUKU</li>
            </a>
            <?php
            if (isset($_SESSION["posisi"])) {

                if ($_SESSION["posisi"] === "admin") {?>
           
            <a href="setting.php">
                <li <?php if (strpos($_SERVER['PHP_SELF'], 'setting.php')) echo 'class=active'; ?>>Setting</li>
            </a>
            <?php }}?>
            <?php
            if (!isset($_SESSION["login"])) :?>
            <a href="login.php">
                <li class="btn-login" style="color: blue;">Login</li>
            </a>
            <?php else : ?>
                <a href="logout.php">
                    <li class="btn-login" style="color: #D12539;">Logout</li>
                </a>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>