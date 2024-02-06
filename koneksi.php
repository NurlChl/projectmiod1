<?php

$conn = mysqli_connect("localhost", "root", "", "projectmiod1");

function query($query) {

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;

    }
    return $rows;
};



// function tambah($data) {
//     global $conn;                                

//     $judul = $data["judul"];
//     $isi_opini = $data["isi_opini"];
//     $kategori = $data["kategori"];
//     $penulis = $data["penulis"];

//     $gambar = upload();
//     if (!$gambar) {
//         return false;
//     }

//     $query = "INSERT INTO opini
//             (judul, isi_opini, kategori, penulis, gambar)
//             VALUES
//             ('$judul', '$isi_opini', '$kategori', '$penulis', '$gambar')
//             ";
//     mysqli_query($conn, $query);

//     return mysqli_affected_rows($conn);
// };

function tambah($data) {
    global $conn;                                

    $judul = $data["judul"];
    $isi_opini = $data["isi_opini"];
    $isi_opini = preg_replace('/<p>/', '', $isi_opini);
    $isi_opini = preg_replace('/<\/p>/', '', $isi_opini);
    // $isi_opini = strip_tags($opinion, '<b><i><strong><em><br>');
    $kategori = $data["kategori"];
    $penulis = $data["penulis"];

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // var_dump(nl2br($isi_opini));die;

    $query = "INSERT INTO opini
            (judul, isi_opini, kategori, penulis, gambar)
            VALUES
            ('$judul', '$isi_opini', '$kategori', '$penulis', '$gambar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

    // $query = "INSERT INTO opini (judul, isi_opini, kategori, penulis, gambar) VALUES (?, ?, ?, ?, ?)";
    
    // $stmt = mysqli_prepare($conn, $query);
    // mysqli_stmt_bind_param($stmt, "sssss", $judul, $isi_opini, $kategori, $penulis, $gambar);
    
    // $result = mysqli_stmt_execute($stmt);
    
    // if ($result) {
    //     mysqli_stmt_close($stmt);
    // } else {
    //     echo "Error: " . mysqli_stmt_error($stmt);
    //     return false;
    // }
    
    // return mysqli_stmt_affected_rows($stmt);
}


function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ( $error === 4 ) {
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu')
            </script>
        ";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Yang anda aplod bukan gambar')
            </script>
        ";
        return false;
    }

    if ($ukuranFile > 10000000) {
        echo "
        <script>
            alert('Ukuran gambar terlalu besar')
        </script>
        ";
        return false;
    }

    $namaFIleBaru = uniqid();
    $namaFIleBaru .= '.';
    $namaFIleBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'gambar/' . $namaFIleBaru);

    return $namaFIleBaru;

}




function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email =  htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $position = strtolower($data["sebagai"]);

    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
        alert('email sudah terdaftar')
        </script>
        ";
        return false;
    }

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
        alert('username sudah terdaftar')
        </script>
        ";
        return false;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users (username, email, password, posisi) VALUES ('$username', '$email', '$password', '$position')");

    return mysqli_affected_rows($conn);

}


function hapus($id_opini) {
    global $conn;
    mysqli_query($conn, "DELETE FROM opini WHERE id_opini = $id_opini");

    return mysqli_affected_rows($conn);
}


function edit($data) {
    global $conn;      

    $id_opini = $data["id_opini"];
    $judul = $data["judul"];
    $isi_opini = $data["isi_opini"];
    $isi_opini = preg_replace('/<p>/', '', $isi_opini);
    $isi_opini = preg_replace('/<\/p>/', '', $isi_opini);
    // $isi_opini = strip_tags($opinion, '<b><i><strong><em><br>');
    $kategori = $data["kategori"];
    $penulis = $data["penulis"];
    $gambarLama = htmlspecialchars($data['gambarLama']);

    if ( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE opini SET
                judul = '$judul',
                isi_opini = '$isi_opini',
                kategori = '$kategori',
                penulis = '$penulis',
                gambar = '$gambar'
             WHERE id_opini = $id_opini
            ";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}


function cari ($keyword) {
    $query = "SELECT * FROM opini
                WHERE
                judul LIKE '%$keyword%' OR
                penulis LIKE '%$keyword%' OR
                tgl_buat LIKE '%$keyword%' OR
                tgl_ubah LIKE '%$keyword%'
            ";

    return query($query);
}


function tambahKomen($data) {
    global $conn;                  

    $id_opini = $data["id_opini"];
    $nama_komen = $data["nama_komen"];
    $isi_komen = $data["isi_komen"];

    // var_dump($id_opini, $nama_komen, $isi_komen);die;

    $query = "INSERT INTO komen
            (id_opini, nama_komen, isi_komen)
            VALUES
            ('$id_opini', '$nama_komen', '$isi_komen')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}



function uploadBuku() {

    $namaFile = $_FILES['gambar_buku']['name'];
    $ukuranFile = $_FILES['gambar_buku']['size'];
    $error = $_FILES['gambar_buku']['error'];
    $tmpName = $_FILES['gambar_buku']['tmp_name'];

    if ( $error === 4 ) {
        echo "
            <script>
                alert('Pilih gambar terlebih dahulu')
            </script>
        ";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Yang anda aplod bukan gambar')
            </script>
        ";
        return false;
    }

    if ($ukuranFile > 10000000) {
        echo "
        <script>
            alert('Ukuran gambar terlalu besar')
        </script>
        ";
        return false;
    }

    $namaFIleBaru = uniqid();
    $namaFIleBaru .= '.';
    $namaFIleBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'gambar_buku/' . $namaFIleBaru);

    return $namaFIleBaru;

}

function tambahBuku($data) {
    global $conn;                                

    $judul_buku = $data["judul_buku"];
    $written_by = $data["written_by"];
    $publish_by = $data["publish_by"];
    $tgl_rilis = $data["tgl_rilis"];
    $genre = $data["genre"];
    $pages = $data["pages"];
    $isbn = $data["isbn"];
    $quotes = $data["quotes"];
    $deskripsi_buku = $data["deskripsi_buku"];
    $link_pembelian = $data["link_pembelian"];

    $gambar_buku = uploadBuku();
    if (!$gambar_buku) {
        return false;
    }


    $query = "INSERT INTO buku
            (judul_buku, written_by, publish_by, tgl_rilis, genre, pages, isbn, quotes, deskripsi_buku, gambar_buku, link_pembelian)
            VALUES
            ('$judul_buku', '$written_by', '$publish_by', '$tgl_rilis', '$genre', $pages, $isbn, '$quotes', '$deskripsi_buku', '$gambar_buku', '$link_pembelian')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


?>