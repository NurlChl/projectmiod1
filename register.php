<?php

session_start();

require 'koneksi.php';

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0 ) {
        echo"
            <script>
                alert('data berhasil ditambahkan')
                document.location.href = 'login.php'
            </script>
        ";
    } else {
       echo mysqli_error($conn);
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <form action="" method="post">
        <div>
            <h2>FURNITURE</h2>
            <ul class="desc">
                <h1>Hello!</h1>
                <p>Silahkan buat akun anda!</p>
            </ul>
            <ul>
                <label for="name">Name</label>
                <input type="text" id="name" name="username" placeholder="Enter your name"/>
            </ul>
            <ul>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"/>
            </ul>
            <ul>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"/>
            </ul>
            <ul class="sebagai">
                <label>Position</label>
                <span>
                    <!-- <li>
                        <input type="radio" name="sebagai" id="admin" value="admin">
                        <label for="admin">Admin</label>
                    </li> -->
                    <li>
                        <input type="radio" name="sebagai" id="user" value="user" checked>
                        <label for="user">User</label>
                    </li>
                </span>
            </ul>
            <button type="submit" name="register">Register</button>
            <p>You have an account? <a href="login.php"><span>Sign In</span></a></p>
        </div>
    </form>

</body>
</html>