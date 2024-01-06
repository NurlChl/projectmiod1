<?php

require 'koneksi.php';

$id_opini = $_GET["id_opini"];

if (hapus($id_opini) > 0 ) {
    echo "
        <script>
            alert('data berhasil dihapus')
            document.location.href = 'index.php'
        </script>
    ";
} else {
    echo mysqli_error($conn);
}



?>