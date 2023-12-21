<?php

session_start();

require 'koneksi.php';


if ( isset($_COOKIE['apasi']) && isset($_COOKIE['key'])) {
    $apasi = $_COOKIE['apasi'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $apasi");
    $row = mysqli_fetch_assoc($result);


    if ( $key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
        $_SESSION["username"] = $row["username"];
        $_SESSION["posisi"] = $row["posisi"];

    }
}


if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {

    $email = $_POST["email"];
    $passwrod = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($passwrod, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["posisi"] = $row["posisi"];

            if (isset($_POST['ingat'])) {
                setcookie('apasi', $row['id'], time()+86400);
                setcookie('key',hash('sha256',  $row['username']), time()+86400);
            }

            header("Location: index.php");
            exit;
        }
    }
    
    $error = true;

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
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
                <h1>Welcome Back</h1>
                <p>Level up the way you create account</p>
            </ul>
            <ul>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"/>
            </ul>
            <ul>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"/>
            </ul>
            <ul>
                <?php if(isset($error)) : ?>
                    <p style="color: red; font-size: .9rem;">Email / Password salah</p>
                <?php endif; ?>
            </ul>
            <ul>
                <li>
                    <input type="checkbox" id="ingat" name="ingat"/>
                    <label for="ingat">Remember me</label>
                </li>
            </ul>
            <button type="submit" name="login">Login</button>
            <p>Don't have account? <a href="register.php"><span>Sign Up</span></a></p>
        </div>
    </form>

    <script>
        function kirim () {
            document.location.href = './'
        }
    </script>
</body>
</html>