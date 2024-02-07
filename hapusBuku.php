<?php

require 'koneksi.php';

$id_buku = $_GET["id_buku"];

if (hapusBuku($id_buku) > 0 ) {
    echo "
        <script>
            alert('buku berhasil dihapus')
            document.location.href = 'buku.php'
        </script>
    ";
} else {
    echo mysqli_error($conn);
}

?>