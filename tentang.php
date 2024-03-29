<?php

session_start();

require_once 'navbar.php';
require 'koneksi.php';


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang</title>
    <link rel="stylesheet" href="tentang.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section class="tentang">
        <h1>Tentang</h1>
        <img src="gambar/ustajah.JPG">

        <div class="konten">
            <h3>Perkenalan tentang pemilik</h3>
            <div class="isi_tentang">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt culpa quo dolore perspiciatis consequuntur dolorem! Adipisci ipsa vel nihil tempora!</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum voluptates tempore magnam esse dolores soluta! Deserunt tenetur eveniet esse explicabo rerum blanditiis saepe molestiae commodi voluptatum facere dolorem incidunt, dolor laudantium minima ad dicta! Rerum nisi expedita pariatur nulla, eum sed itaque reprehenderit fuga! Dicta, delectus. Repellat magnam, ab corrupti, veniam sapien</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam sit assumenda quia corrupti! Necessitatibus cumque nulla animi, ut deserunt fuga, doloribus expedita at consequatur, qui ipsum. Veritatis voluptatibus ipsam libero id est debitis molestias perferendis aliquid. Nesciunt distinctio, accusantium temporibus recusandae eius necessitatibus architecto consectetur nihil quia, quidem, voluptas commodi nemo quos neque corporis dolorum debitis labore fugit magni ad voluptate cumque quae praesentium ullam. Nemo fugiat molestiae quam. Sint itaque incidunt quo laudantium veritatis. Eligendi perferendis voluptatem tenetur saepe, ratione, sapiente perspiciatis, culpa voluptates delectus reprehenderit ex laudantium corporis veniam quaerat consectetur impedit. Veritatis asperiores odit vel sequi? Doloribus, perspiciatis earum beatae voluptatibus ab provident hic, sint amet ipsam, itaque nisi eius iste exercitationem accusamus deleniti. Omnis, atque! Fuga sit a ipsa fugit dignissimos alias, suscipit, tenetur omnis doloremque non quod temporibus animi ducimus nostrum magnam soluta, labore eaque ad quos quisquam sed nisi vel dolorem? Similique ratione ab quod nihil reprehenderit asperiores et, fugit officiis doloremque unde minima voluptatem tempore ipsa harum qui? Veritatis quis accusantium commodi voluptatum, aliquam, error, eum odio aperiam id praesentium amet cum perspiciatis voluptate quo quod vero iste est voluptas eius expedita? Architecto sit impedit tempora quia consequuntur facere, nihil doloremque voluptas vel.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione temporibus nostrum ipsum modi illum error eum officia, maxime eveniet saepe sint voluptatem tenetur sapiente atque autem iusto voluptate facilis corporis vitae hic quia nesciunt odio? Qui fugit temporibus numquam hic adipisci! Officiis voluptate culpa praesentium reiciendis quidem, unde eaque illum.</p>
            </div>
            <div class="share">
                <li class="text-share">Share</li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.puthutea.com/" target="_blank">
                    <li class="fa fa-facebook"></li>
                </a>
                <a href="https://twitter.com/intent/tweet?url=https://www.puthutea.com/&text=Check out this awesome website" target="_blank">
                    <li class="fa fa-twitter"></li>
                </a>
                <a href="whatsapp://send?text=Kunjungi Link Website Berikut: https://www.puthutea.com/" data-action="share/whatsapp/share">
                    <li class="fa fa-whatsapp"></li>
                </a>
            </div>
        </div>
    </section>

    <?php include_once 'footer.php'; ?>
</body>
</html>