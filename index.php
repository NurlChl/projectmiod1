<?php

require 'koneksi.php';
include_once 'navbar.php';

$opini = query("SELECT * FROM opini");

$format_tgl = new \IntlDateFormatter('id_ID', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
$format_tgl->setPattern('MMMM d, y');


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="coba.css">
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

                if (element.clientHeight > maxHeight) {
                    while (element.clientHeight > maxHeight) {
                        element.innerHTML = element.innerHTML.slice(0, -1);
                    }
                    element.innerHTML += "...";
                }
            }
        }



        document.addEventListener('DOMContentLoaded', function() {
            var navbarHeight = document.querySelector('.artikel-terbaru').offsetHeight;

            document.getElementById('myContainer').style.height = navbarHeight + 'px';
        });
      </script>

</head>
<body>

<div class="container" id="myContainer">
  <div class="kotak-artikel">
    <div class="artikel">
        <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
        <div>
            <span class="kategori">Uncategoriez</span>
            <h1>11 NASIHAT KRMTA POORNOMO hadiningrat</h1>
            <ul class="keterangan">
                <p>by <span>Ustadzah</span></p>
                <p>|</p>
                <p>May 8, 2022</p>
            </ul>
            <span class="baris"></span>
            <p class="text-ellipsis">Lorem ipsum, dolor sit adcd vd snvokenvon 
                r adipisicing elit. Ab modi soluta ad alias voluptatem asperiores aliquid laboriosam quod provident recusandae distinctio architecto nemo omnis enim necessitatibus sed non adipisci culpa pariatur nulla, debitis natus, odio quo. Amet eligendi facilis magni cumque omnis doloremque? Quae ut aperiam odit quibusdam est possimus!</p>
        </div>
        <div class="bungkus-sosmed">
            <ul class="komen">
                <li class="material-symbols-rounded">maps_ugc</li>
                <li>Comment,</li>
            </ul>
            <ul>
                <li class="baris"></li>
                <li class="fa fa-facebook"></li>
                <li class="fa fa-twitter"></li>
                <li class="fa fa-whatsapp"></li> 
                <li class="baris"></li>
            </ul>
        </div>
    </div>
    <div class="artikel">
        <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
        <div>
            <span class="kategori">Uncategoriez</span>
            <h1>11 NASIHAT KRMTA POORNOMO hadiningrat</h1>
            <ul class="keterangan">
                <p>by <span>Ustadzah</span></p>
                <p>|</p>
                <p>May 8, 2022</p>
            </ul>
            <span class="baris"></span>
            <p class="text-ellipsis"><p class="text-ellipsis">Lorem ipsum, dolor sit amet consec  tet ujksdfk sjf  mnfeoin snvokenvon 
                r adipisicing elit. Ab modi soluta ad alias voluptatem asperiores aliquid laboriosam quod provident recusandae distinctio architecto nemo omnis enim necessitatibus sed non adipisci culpa pariatur nulla, debitis natus, odio quo. Amet eligendi facilis magni cumque omnis doloremque? Quae ut aperiam odit quibusdam est possimus!</p></p>
        </div>
        <div class="bungkus-sosmed">
            <ul class="komen">
                <li class="material-symbols-rounded">maps_ugc</li>
                <li>Comment,</li>
            </ul>
            <ul>
                <li class="baris"></li>
                <li class="fa fa-facebook"></li>
                <li class="fa fa-twitter"></li>
                <li class="fa fa-whatsapp"></li> 
                <li class="baris"></li>
            </ul>
        </div>
    </div>
    <div class="artikel">
        <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
        <div>
            <span class="kategori">Uncategoriez</span>
            <h1>11 NASIHAT KRMTA POORNOMO hadiningrat</h1>
            <ul class="keterangan">
                <p>by <span>Ustadzah</span></p>
                <p>|</p>
                <p>May 8, 2022</p>
            </ul>
            <span class="baris"></span>
            <p class="text-ellipsis"><p class="text-ellipsis">Lorem ipsum, dolor sit amet consec  tet ujksdfk sjf  mnfeoin snvokenvon 
                r adipisicing elit. Ab modi soluta ad alias voluptatem asperiores aliquid laboriosam quod provident recusandae distinctio architecto nemo omnis enim necessitatibus sed non adipisci culpa pariatur nulla, debitis natus, odio quo. Amet eligendi facilis magni cumque omnis doloremque? Quae ut aperiam odit quibusdam est possimus!</p></p>
        </div>
        <div class="bungkus-sosmed">
            <ul class="komen">
                <li class="material-symbols-rounded">maps_ugc</li>
                <li>Comment,</li>
            </ul>
            <ul>
                <li class="baris"></li>
                <li class="fa fa-facebook"></li>
                <li class="fa fa-twitter"></li>
                <li class="fa fa-whatsapp"></li> 
                <li class="baris"></li>
            </ul>
        </div>
    </div>
    <div class="artikel">
        <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
        <div>
            <span class="kategori">Uncategoriez</span>
            <h1>11 NASIHAT KRMTA POORNOMO hadiningrat</h1>
            <ul class="keterangan">
                <p>by <span>Ustadzah</span></p>
                <p>|</p>
                <p>May 8, 2022</p>
            </ul>
            <span class="baris"></span>
            <p class="text-ellipsis"><p class="text-ellipsis">Lorem ipsum, dolor sit amet consec  tet ujksdfk sjf  mnfeoin snvokenvon 
                r adipisicing elit. Ab modi soluta ad alias voluptatem asperiores aliquid laboriosam quod provident recusandae distinctio architecto nemo omnis enim necessitatibus sed non adipisci culpa pariatur nulla, debitis natus, odio quo. Amet eligendi facilis magni cumque omnis doloremque? Quae ut aperiam odit quibusdam est possimus!</p></p>
        </div>
        <div class="bungkus-sosmed">
            <ul class="komen">
                <li class="material-symbols-rounded">maps_ugc</li>
                <li>Comment,</li>
            </ul>
            <ul>
                <li class="baris"></li>
                <li class="fa fa-facebook"></li>
                <li class="fa fa-twitter"></li>
                <li class="fa fa-whatsapp"></li> 
                <li class="baris"></li>
            </ul>
        </div>
    </div>
    <div class="artikel">
        <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
        <div>
            <span class="kategori">Uncategoriez</span>
            <h1>11 NASIHAT KRMTA POORNOMO hadiningrat</h1>
            <ul class="keterangan">
                <p>by <span>Ustadzah</span></p>
                <p>|</p>
                <p>May 8, 2022</p>
            </ul>
            <span class="baris"></span>
            <p class="text-ellipsis">Lorem ipsum, dolor sit amet snvokenvon 
                r adipisicing elit. Ab modi soluta ad alias voluptatem asperiores aliquid laboriosam quod provident recusandae distinctio architecto nemo omnis enim necessitatibus sed non adipisci culpa pariatur nulla, debitis natus, odio quo. Amet eligendi facilis magni cumque omnis doloremque? Quae ut aperiam odit quibusdam est possimus!</p>
        </div>
        <div class="bungkus-sosmed">
            <ul class="komen">
                <li class="material-symbols-rounded">maps_ugc</li>
                <li>Comment,</li>
            </ul>
            <ul>
                <li class="baris"></li>
                <li class="fa fa-facebook"></li>
                <li class="fa fa-twitter"></li>
                <li class="fa fa-whatsapp"></li> 
                <li class="baris"></li>
            </ul>
        </div>
    </div>
  </div>

  <div class="artikel-terbaru">
    <h2>TERBARU</h2>
    
    <div>
        <ul>
            <div>
                <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
                <li>
                    <h1>11 Nasihat KRMTA Poornomo ningrat</h1>
                    <p>May 8, 2022</p>
                </li>
            </div>
        </ul>
    </div>

    <div>
        <ul>
            <div>
                <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
                <li>
                    <h1>11 Nasihat KRMTA Poornomo ningrat</h1>
                    <p>May 8, 2022</p>
                </li>
            </div>
        </ul>
    </div>

    <div>
        <ul>
            <div>
                <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
                <li>
                    <h1>11 Nasihat KRMTA Poornomo ningrat</h1>
                    <p>May 8, 2022</p>
                </li>
            </div>
        </ul>
    </div>

    <div>
        <ul>
            <div>
                <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
                <li>
                    <h1>11 Nasihat KRMTA Poornomo ningrat</h1>
                    <p>May 8, 2022</p>
                </li>
            </div>
        </ul>
    </div>

    <div>
        <ul>
            <div>
                <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
                <li>
                    <h1>11 Nasihat KRMTA Poornomo ningrat</h1>
                    <p>May 8, 2022</p>
                </li>
            </div>
        </ul>
    </div>

    <div>
        <ul>
            <div>
                <img src="https://www.puthutea.com/wp-content/uploads/2019/05/PEA.jpg" />
                <li>
                    <h1>11 Nasihat KRMTA Poornomo ningrat</h1>
                    <p>May 8, 2022</p>
                </li>
            </div>
        </ul>
    </div>
  </div>
</div>

</body>
</html>
