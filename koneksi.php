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

    $query = "INSERT INTO opini (judul, isi_opini, kategori, penulis, gambar) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $judul, $isi_opini, $kategori, $penulis, $gambar);
    
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        return mysqli_stmt_affected_rows($stmt);
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
        return false;
    }

    mysqli_stmt_close($stmt);
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


?>