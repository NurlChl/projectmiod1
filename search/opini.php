<?php

session_start();

require '../koneksi.php';



if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$pengguna = $_SESSION["username"];

$keyword = $_GET['keyword'];

$query = "SELECT * FROM opini
            WHERE
        judul LIKE '%$keyword%' OR
        penulis LIKE '%$keyword%' OR
        tgl_buat LIKE '%$keyword%' OR
        tgl_ubah LIKE '%$keyword%'
        ";


$opini = query($query);

?>

        <table id="konten">
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
                <?php foreach ($opini as $opini) : ?>
                <tr>
                    <td><?= $opini['judul'] ?></td>
                    <td><?= $opini['kategori'] ?></td>
                    <td>
                        <p class="isi"><?= $opini['isi_opini'] ?></p>
                    </td>       
                    <td><?= $opini['penulis'] ?></td>
                    <td><?= $opini['tgl_buat'] ?></td>
                    <td><?= $opini['tgl_ubah'] ?></td>
                    <td>
                        <div>
                            <a href="editOpini.php?id_opini=<?= $opini['id_opini'] ?>">
                                <button type="submit" name="editOpini" class="edit">Edit</button>
                            </a>
                            <a href="hapusOpini.php?id_opini=<?= $opini['id_opini'] ?>" onclick="
                                    return confirm('yakin?');">
                            <button type="submit" name="hapusOpini" class="hapus">Hapus</button>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>