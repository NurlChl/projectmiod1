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
            color: rgb(30, 124, 255);
        }
    </style>
</head>
<body>
    <nav>
        <img src="gambar/logoustajahcrop.png" />

        <ul>
            <a href="index.php">
                <li <?php if (strpos($_SERVER['PHP_SELF'], 'index.php')) echo 'class=active'; ?>>HOME</li>
            </a>
            <!-- <li>OPINI</li> -->
            <!-- <li>BAHASA ARAB</li> -->
            <li>TENTANG</li>
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
                    <li class="btn-login" style="color: red;">Logout</li>
                </a>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>