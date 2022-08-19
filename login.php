<?php

    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: dashboard/');
    }

    include 'config.php';
    $db = dbConnect();
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $exec = $db->query($query);

        if (mysqli_num_rows($exec) > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['user'] = true;
            header('Location: dashboard/index.php');
        }else{
            header('Location: login.php?msg=1');
        }

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                            <h1>Login</h1>
                        </b>
                    </div>
                    
                    <?php if(isset($_GET['msg']) == "1"):?>
                        
                        <div class="alert alert-warning" role="alert">
                            Email / Password Salah!!!
                        </div>
                    <?php endif;?>

                    <form action="" method="post">
                        <div class="mt-2">
                            <input type="email" name="email" placeholder="user@gmail.com" class="form-control" required>
                        </div>

                        <div class="mt-2">
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        Belum punya akun?<a href="register.php" style="text-decoration:none;"> Register</a>
                        <div class="mt-2">
                            <button type="submit" name="login" class="btn btn-secondary">Login</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>