<?php

    include 'config.php';
    $db = dbConnect();
    // $angka = 2;

    // $kodesesi = "SessionKode-".random_int(1, 100000);

    // for ($i = 0; $i < $angka; $i++) { 
    //     $id = "TIX-ID-".random_int(5, 10000);
    //     echo "<br>";
    //     echo "<br>";
    //     echo $id;
    //     echo "<br>";
    //     echo $kodesesi;
    // }


    if (isset($_POST['register'])) {
        $id = "USER-".random_int(3, 1000);
        $email = $_POST['email'];
        $noTelp = $_POST['noTelp'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $findEmail = "SELECT * FROM user WHERE email = '$email'";
        $execFind = $db->query($findEmail);

        if (mysqli_num_rows($execFind) > 1) {
            echo "
                <script>
                    alert('Email Sudah Digunakan, Harap Ganti!!!');
                    document.location.href = 'register.php';
                </script>
            ";
        }else{
            $data = "INSERT INTO user VALUES ('$id', '$username', '$email', '$password', '$noTelp')";
            $execInsert = $db->query($data);

            if ($execInsert) {
                echo "
                    <script>
                        alert('Berhasil Daftar');
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Gagal Daftar');
                    </script>
                ";
            }
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
    <a class="navbar-brand" href="#">
        <img src="https://go-tix.id/images/gotix-image-brand.svg" width="50%">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar -->

    <div class="container">
        <div class="mt-5">
            <div class="container card" style="background-color: pink;border-style: none;">
                <div class="card-body">
                    <div class="mt-2 mb-3">
                        <b>
                            <h1>Register</h1>
                        </b>
                    </div>

                    <form action="" method="post">
                        <div class="mt-2">
                            <input type="email" name="email" placeholder="user@gmail.com" class="form-control" required>
                        </div>

                        <div class="mt-2">
                            <input type="number" name="noTelp" placeholder="Number Phone" class="form-control" required>
                        </div>

                        <div class="mt-2">
                            <input type="text" name="username" placeholder="Username" class="form-control" required>
                        </div>

                        <div class="mt-2">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        Sudah punya akun?<a href="login.php" style="text-decoration:none;"> Login</a>
                        <div class="mt-2">
                            <button type="submit" name="register" class="btn btn-secondary">Register</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>