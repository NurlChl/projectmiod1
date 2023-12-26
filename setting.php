<?php




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <link rel="stylesheet" href="setting.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
          document.addEventListener("DOMContentLoaded", function() {
            addEllipsisToClass("isi");
        });

        function addEllipsisToClass(className) {
            var elements = document.getElementsByClassName(className);

            for (var i = 0; i < elements.length; i++) {
                var element = elements[i];
                var lineHeight = parseInt(window.getComputedStyle(element).lineHeight);
                var maxLines = 3; 
                var maxHeight = lineHeight * maxLines;

                if (element.clientHeight > maxHeight) {
                    while (element.clientHeight > maxHeight) {
                        element.innerHTML = element.innerHTML.slice(0, -1);
                    }
                    element.innerHTML += "...";
                }
            }
        }
    </script>
</head>
<body>
    <section class="setting">
        <div>
            <h1>Setting</h1>
            <ul>
                <input type="search" name="search" placeholder="Cari...">
                <button type="submit" name="btn-search">Cari</button>
            </ul>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Isi</th>
                    <th>Penulis</th>
                    <th>Tgl dibuat</th>
                    <th>Terakhir diubah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>11 KRMTA Hadiningrat</td>
                    <td>Uncategories</td>
                    <td>
                        <p class="isi">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem cumque aliquam magnam magni deleniti cupiditate similique suscipit doloremque tenetur est dolor impedit nulla voluptatibus officiis aut saepe ipsam blanditiis voluptatem, necessitatibus optio exercitationem numquam unde dignissimos? Consectetur sapiente aliquid aliquam? Omnis quasi dolores deserunt corrupti sit voluptate et odio repudiandae illo fugiat, eveniet nihil numquam fuga, commodi saepe dignissimos, labore temporibus earum nostrum distinctio cum quisquam a hic? Quod recusandae est repellat eaque, numquam quia odit ipsum ad ratione. Quos possimus adipisci repellat quasi, molestiae eveniet totam, repellendus saepe quidem fugit asperiores rerum perspiciatis iste cumque perferendis inventore commodi hic. Corporis quis asperiores reprehenderit, quisquam, similique molestias voluptatem in velit, accusamus reiciendis labore. Hic necessitatibus illo totam exercitationem cumque nulla ex et maiores rerum, odit odio repellendus distinctio expedita. Voluptatum mollitia magnam explicabo. Maxime minima eos debitis ab in rerum sapiente eveniet odit ullam necessitatibus est beatae explicabo adipisci nam, earum ad placeat libero ea, totam nisi natus sequi voluptatum delectus dolorem. Fugiat, iste. Nisi, iusto cumque consectetur provident magnam dolorem excepturi officiis error, et odit esse qui ipsa. Porro nesciunt magnam aliquid possimus. Praesentium corporis cum at laboriosam soluta, beatae, iusto esse necessitatibus excepturi alias quaerat quia non neque?
                        </p>
                    </td>       
                    <td>Ustadzah</td>
                    <td>Januari 12, 2026</td>
                    <td>Januari 12, 2026</td>
                    <td>
                        <div>
                            <button type="submit" class="edit">Edit</button>
                            <button type="submit" class="hapus">Hapus</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11 KRMTA Hadiningrat</td>
                    <td>Uncategories</td>
                    <td>
                        <p class="isi">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem cumque aliquam magnam magni deleniti cupiditate similique suscipit doloremque tenetur est dolor impedit nulla voluptatibus officiis aut saepe ipsam blanditiis voluptatem, necessitatibus optio exercitationem numquam unde dignissimos? Consectetur sapiente aliquid aliquam? Omnis quasi dolores deserunt corrupti sit voluptate et odio repudiandae illo fugiat, eveniet nihil numquam fuga, commodi saepe dignissimos, labore temporibus earum nostrum distinctio cum quisquam a hic? Quod recusandae est repellat eaque, numquam quia odit ipsum ad ratione. Quos possimus adipisci repellat quasi, molestiae eveniet totam, repellendus saepe quidem fugit asperiores rerum perspiciatis iste cumque perferendis inventore commodi hic. Corporis quis asperiores reprehenderit, quisquam, similique molestias voluptatem in velit, accusamus reiciendis labore. Hic necessitatibus illo totam exercitationem cumque nulla ex et maiores rerum, odit odio repellendus distinctio expedita. Voluptatum mollitia magnam explicabo. Maxime minima eos debitis ab in rerum sapiente eveniet odit ullam necessitatibus est beatae explicabo adipisci nam, earum ad placeat libero ea, totam nisi natus sequi voluptatum delectus dolorem. Fugiat, iste. Nisi, iusto cumque consectetur provident magnam dolorem excepturi officiis error, et odit esse qui ipsa. Porro nesciunt magnam aliquid possimus. Praesentium corporis cum at laboriosam soluta, beatae, iusto esse necessitatibus excepturi alias quaerat quia non neque?
                        </p>
                    </td>       
                    <td>Ustadzah</td>
                    <td>Januari 12, 2026</td>
                    <td>Januari 12, 2026</td>
                    <td>
                        <div>
                            <button type="submit" class="edit">Edit</button>
                            <button type="submit" class="hapus">Hapus</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>11 KRMTA Hadiningrat</td>
                    <td>Uncategories</td>
                    <td>
                        <p class="isi">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem cumque aliquam magnam magni deleniti cupiditate similique suscipit doloremque tenetur est dolor impedit nulla voluptatibus officiis aut saepe ipsam blanditiis voluptatem, necessitatibus optio exercitationem numquam unde dignissimos? Consectetur sapiente aliquid aliquam? Omnis quasi dolores deserunt corrupti sit voluptate et odio repudiandae illo fugiat, eveniet nihil numquam fuga, commodi saepe dignissimos, labore temporibus earum nostrum distinctio cum quisquam a hic? Quod recusandae est repellat eaque, numquam quia odit ipsum ad ratione. Quos possimus adipisci repellat quasi, molestiae eveniet totam, repellendus saepe quidem fugit asperiores rerum perspiciatis iste cumque perferendis inventore commodi hic. Corporis quis asperiores reprehenderit, quisquam, similique molestias voluptatem in velit, accusamus reiciendis labore. Hic necessitatibus illo totam exercitationem cumque nulla ex et maiores rerum, odit odio repellendus distinctio expedita. Voluptatum mollitia magnam explicabo. Maxime minima eos debitis ab in rerum sapiente eveniet odit ullam necessitatibus est beatae explicabo adipisci nam, earum ad placeat libero ea, totam nisi natus sequi voluptatum delectus dolorem. Fugiat, iste. Nisi, iusto cumque consectetur provident magnam dolorem excepturi officiis error, et odit esse qui ipsa. Porro nesciunt magnam aliquid possimus. Praesentium corporis cum at laboriosam soluta, beatae, iusto esse necessitatibus excepturi alias quaerat quia non neque?
                        </p>
                    </td>       
                    <td>Ustadzah</td>
                    <td>Januari 12, 2026</td>
                    <td>Januari 12, 2026</td>
                    <td>
                        <div>
                            <button type="submit" class="edit">Edit</button>
                            <button type="submit" class="hapus">Hapus</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>